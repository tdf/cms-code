<?php
/**
 * This class lets you export a static copy of your site.
 * It creates a huge number of folders each containing an index.html file.
 * This preserves the URL naming format.
 * 
 * Requirements: Unix Filesystem supporting symlinking. Doesn't work on Windows.
 * 
 * <b>Usage</b>
 * 
 * The exporter can only be invoked through a URL. Usage on commandline (through [sake](sake)) is not possible at the moment, as we're sending a file to the browser for download.
 * 
 * <pre>http://localhost/StaticExporter/export</pre>
 * 
 * Specify a custom baseurl in case you want to deploy the static HTML pages on a different host:
 * <pre>http://localhost/StaticExporter/export?baseurl=http://example.com</pre>
 * 
 * @see StaticPublisher
 * 
 * @package cms
 * @subpackage export
 */
class StaticExporter extends Controller {
	function init() {
		parent::init();
		
		$canAccess = (($_SERVER['REMOTE_ADDR'] == '127.0.0.1') || ($_SERVER['REMOTE_ADDR'] == '::1') || Director::isDev() || Director::is_cli() || Permission::check("ADMIN"));
		if(!$canAccess) return Security::permissionFailure($this);
	}
		
	
	function Link($action = null) {
		return "StaticExporter/$action";
	}
	
	function index() {
		echo "<h1>"._t('StaticExporter.NAME','Static exporter')."</h1>";
		echo $this->StaticExportForm()->forTemplate();
	}
	
	function StaticExportForm() {
		return new Form($this, 'StaticExportForm', new FieldSet(
			// new TextField('folder', _t('StaticExporter.FOLDEREXPORT','Folder to export to')),
			new TextField('baseurl', _t('StaticExporter.BASEURL','Base URL'))
		), new FieldSet(
			new FormAction('export', _t('StaticExporter.EXPORTTO','Export to that folder'))
		));
	}
	
	function export() {
		// specify custom baseurl for publishing to other webroot
		if(isset($_REQUEST['baseurl'])) {
			$base = $_REQUEST['baseurl'];
			if ($base == "relative") {
				$rewrite_urls=true;
			} else {
				$rewrite_urls=false;
				if(substr($base,-1) != '/') $base .= '/';
				Director::setBaseURL($base);
			}
		}
		
		// setup temporary folders
		$tmpBaseFolder = TEMP_FOLDER . '/static-export';
		$tmpFolder = "$tmpBaseFolder/html";
		if(!file_exists($tmpFolder)) Filesystem::makeFolder($tmpFolder);
		$baseFolderName = basename($tmpFolder);

		// iterate through all instances of SiteTree
		Translatable::disable_locale_filter();
		$pages = DataObject::get("SiteTree","ClassName<>'UserDefinedForm' AND ClassName<>'Forum' AND ClassName<>'ForumHolder' AND ClassName<>'ErrorPage'");
		Translatable::enable_locale_filter();
		foreach($pages as $page) {
			$subfolder   = "$tmpFolder/" . trim($page->RelativeLink(null, true), '/');
			$contentfile = "$tmpFolder/" . trim($page->RelativeLink(null, true), '/') . '/index.html';
			
			// Make the folder				
			if(!file_exists($subfolder)) {
				Filesystem::makeFolder($subfolder);
			}
			
			// Run the page
			Requirements::clear();
			$link = Director::makeRelative($page->Link());
			$response = Director::test($link);

			// Write to file
			if($fh = fopen($contentfile, 'w')) {
				if($rewrite_urls) {
					$replace_with='../';
					$parent = $page->Parent;
					while ($parent) {
						$replace_with .= "../";
						$parent = $parent->Parent;
					}
					// remove base tag (ignored by firefox 3) and instead rewrite each URL
					// pointing to a local ressource by a relative one, appending index.html
					// for websites-URLs (between site and anchor) so that local use works
					// special treatment for home that would otherwise end up as /index.html
					fwrite($fh, preg_replace('#\s*<base href.*#', '', HTTP::urlRewriter($response->getBody(), 'preg_replace(array("#^/?(?:../)*((?:assets|themes)/.*)#", "$^/([^#]*/)(#?.*)$", "$^/(#?.*)$", "#^'.Director::absoluteURL("/").'(.*)#"),array("'.$replace_with.'\$1","'.$replace_with.'\$1index.html\$2","'.$replace_with.'home/index.html\$2" ,"'.$replace_with.'\$1"), $URL)'), 1));
				} else {
					fwrite($fh, $response->getBody());
				}
				fclose($fh);
			}
		}

		// copy homepage (URLSegment: "home") only on regular export
		if ($rewrite_urls) {
			if(file_exists("$tmpFolder/index.html")) {
				if(!file_exists($tmpFolder."/home")) Filesystem::makeFolder($tmpFolder."/home");
				rename("$tmpFolder/index.html","$tmpFolder/home/index.html");
			}
		} elseif (file_exists("$tmpFolder/home/index.html")) {
			copy("$tmpFolder/home/index.html", "$tmpFolder/index.html");
		}
		// archive all generated files
		`cd $tmpBaseFolder; tar -czhf $baseFolderName.tar.gz $baseFolderName`;
		$archiveContent = file_get_contents("$tmpBaseFolder/$baseFolderName.tar.gz");
		
		// remove temporary files and folder
		Filesystem::removeFolder($tmpBaseFolder);
		
		// return as download to the client
		$response = SS_HTTPRequest::send_file($archiveContent, "$baseFolderName.tar.gz", 'application/x-tar-gz');
		echo $response->output();
	}
	
}

?>