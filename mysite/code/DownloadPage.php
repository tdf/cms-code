<?php
/**
 * Defines the DownloadPage type
 * adds a nested ul of downloadlinks that are expanded/collapsed with jquery
 * (reads available files from rsync output)
 */
class DownloadPage extends Page {
}

class DownloadPage_Controller extends Page_Controller {
	private static $platformnames= array (
		"win/x86"    => array("Nice" => "Windows",          "fortemplate" => "winx86"),
		"deb/x86"    => array("Nice" => "Linux x86 (deb)",  "fortemplate" => "debx86"),
		"deb/x86_64" => array("Nice" => "Linux x64 (deb)",  "fortemplate" => "debx86_64"),
		"rpm/x86"    => array("Nice" => "Linux x86 (rpm)",  "fortemplate" => "rpmx86"),
		"rpm/x86_64" => array("Nice" => "Linux x64 (rpm)",  "fortemplate" => "rpmx86_64"),
		"mac/ppc"    => array("Nice" => "Mac OS X (PPC)",   "fortemplate" => "macppc"),
		"mac/x86"    => array("Nice" => "Mac OS X (Intel)", "fortemplate" => "macintel")
		);

	const MINAGE = 1800; // 30 Minutes minimum interval between rereading the downloads

	private static $parsedresult = NULL;

	public static function RsyncRefresh() {
		return (int)(time() / self::MINAGE); // Returns a new number every MINAGE seconds
	}

	private static function parseDownloads() {
		exec("rsync -r rsync://rsync.documentfoundation.org/tdf-pub/ > ".TEMP_FOLDER."/rsynclist.lst");
		$array = file(TEMP_FOLDER."/rsynclist.lst",FILE_IGNORE_NEW_LINES);
		if (!$array) return false;
		$result = array();
		foreach ($array as $value) {
			if ($value[0]=="d") continue;
			//-rw-r--r--    12063639 2010/11/11 13:31:05 libreoffice/src/libreoffice-build-3.2.99.3.tar.gz
			$pathname = preg_split("/ +/", $value);
			$pathcomponents = explode("/", $pathname[4]);

			if ($pathcomponents[1] == "src") {
				$temp = explode("-", $pathcomponents[2]);
				$version = explode(".tar",end($temp));
				$result["src"][$version[0]][]=$pathcomponents[2];
				continue;
			}

			$version = $pathcomponents[2];
			$platform = $pathcomponents[3]."/".$pathcomponents[4];

			$filenamesplit = explode("_", $pathcomponents[5]);
			$product = $filenamesplit[0];
			$type = explode("-",$filenamesplit[4]); //langpack/install

			$dummy = explode(".",$filenamesplit[5]);
			$language = $dummy[0];

			if($product == "LibO-SDK") {
				$result["SDK"][$platform] = $pathname[4];
			} else {
				$result["LibreOffice"][$version][$platform][$language][$type[0]] = $pathname[4];
			}
		}
		$result_dos = new ArrayData(array());

		/* parse the sources */
		$src  = new DataObjectSet();
		foreach($result["src"] as $version => $linkarray) {
			$link_dos = new DataObjectSet();
			foreach($linkarray as $mirrorpath) {
				$link_dos->push(new ArrayData(array("Filename" => $mirrorpath)));
			}
			$src->push(new ArrayData(array("Version" => $version, "Files" => $link_dos)));
		}
		$src->sort("Version","DESC");
		$result_dos->Sources = $src;

		/* parse the SDK */
		$sdk  = new DataObjectSet();
		foreach($result["SDK"] as $platform => $mirrorname) {
			$sdk->push(new ArrayData(array("Platform" => $platform, "PlatformNice" =>self::$platformnames[$platform]["Nice"], "File" => $mirrorname, "Filename"=> end(explode("/",$mirrorname)))));
		}
		$result_dos->SDK = $sdk;

		/* the office files */
		$libo = new DataObjectSet();
		$langarray = array();
		foreach($result["LibreOffice"] as $version => $platformarray) {
			$platform_dos = new DataObjectSet();
			foreach($platformarray as $platform => $languagearray) {
				/* Windows is special, has multi-installer, no languagepacks */
				if ($platform == "win/x86") {
					$win_dos= new DataObjectSet();
					$win_dos->push(new ArrayData(array("Type"=>"multi", "File"=>$languagearray["multi"]["install"], "Filename"=> end(explode("/",$languagearray["multi"]["install"])))));
					$win_dos->push(new ArrayData(array("Type"=>"all",   "File"=>$languagearray["all"]["install"],   "Filename"=> end(explode("/",$languagearray["all"]["install"])))));
					$platform_dos->push(new ArrayData(array("Platformname"=>self::$platformnames[$platform]["fortemplate"], "PlatformNice" =>self::$platformnames[$platform]["Nice"], "Links"=>$win_dos)));
					continue;
				}
				$langpacks_dos = new DataObjectSet();
				foreach($languagearray as $language => $filetypearray) {
					if(array_key_exists("langpack", $filetypearray)) {
						$langpack = $filetypearray["langpack"];
						$langpacks_dos->push(new ArrayData(array(
							"Language"         => $language,
							"LanguageNiceLocal"     => i18n::get_language_name($language, true),
							"Langpack"         => $langpack,
							"FilenameLangpack" => end(explode("/",$langpack)))));
						/* for populating the dropdown selector TODO: make use of relations, remove duplication */
						$langarray[] =array(
						        "Language"         => $language,
							"LanguageNiceUS"     => i18n::get_language_name($language),
							"LanguageNiceLocal"     => i18n::get_language_name($language, true));
					}
				}
				$fullinstall=$languagearray["en-US"]["install"];
				$platform_dos->push(new ArrayData(array("Platformname" =>self::$platformnames[$platform]["fortemplate"], "Fullinstall"=>$fullinstall, "FilenameFull"=>end(explode("/", $fullinstall)), "PlatformNice" =>self::$platformnames[$platform]["Nice"], "Langpacks" => $langpacks_dos)));
			}
			$platform_dos->sort("PlatformNice", "DESC");
			$libo->push(new ArrayData(array("Version" => $version, "Data" => $platform_dos)));
		}
		$result_dos->LibreOffice = $libo;

		$result_dos->Languages = new DataObjectSet($langarray);
		$result_dos->Languages->removeDuplicates("Language");
		$result_dos->Languages->sort("LanguageNiceLocal", "ASC");

		$platforms = new DataObjectSet();
		foreach(self::$platformnames as $platform) {
			$platforms->push(new ArrayData(array("PlatformTemplate"=>$platform["fortemplate"], "PlatformNice"=>$platform["Nice"])));
		}
		$platforms->sort("PlatformNice", "DESC");
		$result_dos->Platforms=$platforms;

		$result_dos->Timestamp=time();
		self::$parsedresult = $result_dos;
	}

	function init () {
		parent::init();
		Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
		Requirements::javascript('mysite/javascript/download.js');
	}

	public function GetDownloads() {
		if (self::$parsedresult === NULL) {
			self::parseDownloads();
		}
		return self::$parsedresult;
	}
}

?>
