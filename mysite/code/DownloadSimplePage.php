<?php
/**
 * DownloadSimplePage, defines some controls to be used in the template
 */
class TypeData extends ArrayData {
	public static $typenames = array (
		"win-x86"      => "Windows",
		"mac-x86"      => "Mac OS X (Intel)",
		"mac-ppc"      => "Mac OS X (PPC)",
		"deb-x86"      => "Linux - deb (x86)",
		"deb-x86_64"   => "Linux - deb (x86_64)",
		"rpm-x86"      => "Linux - rpm (x86)",
		"rpm-x86_64"   => "Linux - rpm (x86_64)",
		"box"          => "CD/DVD-images",
		"src"          => "Source code"
		);
	private static $typeorder = array (
		"win-x86"      => 1,
		"mac-x86"      => 2,
		"mac-ppc"      => 3,
		"deb-x86"      => 4,
		"deb-x86_64"   => 5,
		"rpm-x86"      => 6,
		"rpm-x86_64"   => 7,
		"box"          => 8,
		"src"          => 9
		);
	public function getName() {
		return isset(self::$typenames[$this->Type]) ? self::$typenames[$this->Type] : $this->Type;
	}
	public function getOrder() {
		return isset(self::$typeorder[$this->Type]) ? self::$typeorder[$this->Type] : 9;
	}
	public function getLink() {
		return Controller::curr()->Link().
			"?type=".urlencode($this->Type).
			(isset($_GET["lang"]) ? "&lang=".urlencode($_GET["lang"]) : "").
			(isset($_GET["version"]) ? "&version=".urlencode($_GET["version"]) : "");
	}
}
class LangData extends ArrayData {
	public function getNativeName() {
		return i18n::get_language_name($this->Lang, true);
	}
	public static function localeName($locale) {
		$name = ucfirst(i18n::get_language_name($locale, false));
		$name = _t("LocaleName.".$locale, $name);
		return $name ? $name : $locale;
	}
	public function getName() {
		return LangData::localeName($this->Lang);
	}
	public function getLink() {
		return Controller::curr()->Link()."?".
			(isset($_GET["type"]) ? "type=".urlencode($_GET["type"])."&" : "").
			"lang=".urlencode($this->Lang).
			(isset($_GET["version"]) ? "&version=".urlencode($_GET["version"]) : "");
	}
}

class DownloadSimplePage extends Page {
	static $db = array(
		"dot_zero_warning" => "HTMLText",
		"dot_one_warning"  => "HTMLText"
		);
	// show it to the CMS editor page
	function getCMSFields() {
		$fields = parent::getCMSFields();
		//new field, add above "Content" area
		$fields->addFieldToTab('Root.Content.Main', new HTMLEditorField('dot_zero_warning','Warning text for x.y.0 Versions (leave emtpy to disable)', 10), 'Content');
		$fields->addFieldToTab('Root.Content.Main', new HTMLEditorField('dot_one_warning', 'Warning text for x.y.1 Versions (leave emtpy to disable)', 10), 'Content');

		return $fields;
	}
}
class DownloadSimplePage_Controller extends Page_Controller {
	public function getTypes() {
		$types = new DataObjectSet();
		foreach (TypeData::$typenames as $key => $value) {
			$types->push(new ArrayData(array("osarch" => $key, "label" => $value, "current" => ($key == $this->Type) ? true : false)));
		}
		return $types;
	}
	public function Languages($type = null) {
		if (is_null($type)) $type = $this->Type;
		if (is_null($type)) return new DataObjectSet();

		$cache = SS_Cache::factory('DownloadSimplePageController');
		if (!($result = unserialize($cache->load(str_replace("-", "_", "-languages"))))) {
			$langs = DataObject::get("Download", "Lang != '' AND Lang != 'multi'");
			$langs->removeDuplicates("Lang");
			$result= new DataObjectSet();
			foreach ($langs->column("Lang") as $entry)
				$result->push(new LangData(array("Lang" => $entry)));
			$result->sort("Name");
			$cache->save(serialize($result));
		}
		return $result;
	}

	public function Versions() {

		$cache = SS_Cache::factory('DownloadSimplePageController');
		if (!($result = unserialize($cache->load("_versions")))) {
			// order in the order first stable, then testing versions only available as box, then as portable,
			// then the rest (appstore (ancient version) )
			$vers = DataObject::get("Download", null,
				" FIELD(Type,'portable', 'box', 'testing', 'stable') DESC, Type, Version DESC");
			$vers->removeDuplicates("Version");
			$vers->First()->Recommended = true;
			$versarray = $vers->groupBy("Type");
			$result = new DataObjectSet();
			$result->push(new ArrayData(array('Type' => "stable",  'data' => array_shift($versarray))));
			$result->push(new ArrayData(array('Type' => "testing", 'data' => array_shift($versarray))));
			$other = new DataObjectSet();
			foreach ($versarray as $type => $dos) {
				$other->merge($dos);
			}
			$other->sort("Version", "DESC");
			$result->push(new ArrayData(array('Type' => "other", 'data' => $other)));
			$cache->save(serialize($result));
		}
		return $result;
	}
	public function Downloads($type = null, $lang = null, $version = null) {
		if (is_null($type)) $type = $this->Type;
		if (is_null($lang)) $lang = $this->Lang;
		if (is_null($version)) $version = $this->Version;
		return self::get_downloads($type, $lang, $version);
	}
	public static function get_downloads($type = null, $lang = null, $version = null) {
		if (is_null($type) || ($type != "box" && $type != "src" && $type != 'SDK' && is_null($lang)) || is_null($version)) return new DataObjectSet();

		$osarch = explode("-", $type);
		if( $type == "box" || $type == "src" ) {
			$main = new ArrayData(array("full" => DataObject::get("Download", "Type = '".convert::raw2sql($type)."' "
				."AND Version = '".convert::raw2sql($version)."'")));
		} elseif( $type == "SDK" ) {
			$main = new ArrayData(array("full" => DataObject::get_one("Download", "InstallType = 'SDK' "
				."AND Version  = '".convert::raw2sql($version)  ."' "
				."AND Platform = '".convert::raw2sql($osarch[0])."' "
				."AND Arch     = '".convert::raw2sql($osarch[1])."'")));
		} else {
			$full = DataObject::get_one("Download", "InstallType = 'Full' "
				."AND Version  = '".convert::raw2sql($version)  ."' "
				."AND Platform = '".convert::raw2sql($osarch[0])."' "
				."AND Arch     = '".convert::raw2sql($osarch[1])."'");
			$downloads["full"] = $full;
			if ($full) {
				$langpacks = $full->Langpacks();
				$helppacks = $full->Helppacks();
				if ($langpacks) {
					$pack = $langpacks->find("Lang", $lang);
					if ($pack) $downloads["langpack"] = $pack;
				}
				if ($helppacks) {
					$pack = $helppacks->find("Lang", $lang);
					if ($pack) {
						$downloads["helppack"] = $pack;
					} else {
						$pack = $helppacks->find("Lang", "en-US");
						$downloads["helppack"] = $pack;
						$downloads["helppack"]->setField("fallback", true);
					}
				}
			}
			$main = new ArrayData($downloads);
		}
		// just check with any installer whether the version is in testing dir (as src-packages don't give a hint)
		$main->setField("IsPreRelease", (DataObject::get_one("Download", "Type = 'testing' AND Version ='".convert::raw2sql($version)."'")) ? true : false);
		return $main;
	}
	public function DownloadPortables($type = null, $lang = null, $version = null) {
		if (is_null($type)) $type = $this->Type;
		if (is_null($lang)) $lang = $this->Lang;
		if (is_null($version)) $version = $this->Version;
		if (is_null($type) || ($type != "box" && $type != "src" && is_null($lang)) || is_null($version)) return new DataObjectSet();

		$portableLangs = array("zh-CN","zh-TW","nl","en-US","en-GB","fr","de","hu","it","ja","ko","pl","pt","pt-BR","ru","es");
		$result = DataObject::get_one("Download", "Type = 'portable' AND Version ='".convert::raw2sql($version)."' "
			."AND Filename LIKE '%Multilingual".(in_array($lang, $portableLangs) ? "Normal" : "All")."%'");
		return $result;
	}
	public function DownloadIsos($type = null, $lang = null, $version = null) {
		if (is_null($type)) $type = $this->Type;
		if (is_null($lang)) $lang = $this->Lang;
		if (is_null($version)) $version = $this->Version;
		if (is_null($type) || is_null($lang) || is_null($version)) return new DataObjectSet();

		$result = DataObject::get("Download", "Type = 'box' AND Version = '".convert::raw2sql($version)."' ");
		if ($result) {
			foreach ($result as $iso) {
				$iso->setField("InstallMedia", (strpos(strtolower($iso->Filename), "dvd") !== FALSE ) ? "DVD" : "CD");
			}
		}
		return $result;
	}
	public function DownloadAppStores($type = null, $lang = null, $version = null) {
		if (is_null($type)) $type = $this->Type;
		if (is_null($lang)) $lang = $this->Lang;
		if (is_null($version)) $version = $this->Version;
		if (is_null($type) || is_null($lang) || is_null($version)) return new DataObjectSet();

		$osarch = explode('-', $type);
		$result = DataObject::get_one("Download", "Type = 'appstore' AND Version = '".convert::raw2sql($version)."' "
			."AND Platform = '".convert::raw2sql($osarch[0])."' "
			."AND Arch     = '".convert::raw2sql($osarch[1])."'");
		return $result;
	}
	public function DownloadSdks($type = null, $lang = null, $version = null) {
		if (is_null($type)) $type = $this->Type;
		if (is_null($lang)) $lang = $this->Lang;
		if (is_null($version)) $version = $this->Version;
		if (is_null($type) || $type == "box" || ($type != "src" && is_null($lang)) || is_null($version)) return new DataObjectSet();

		$osarch = explode("-", $type);
		$result = DataObject::get_one("Download", "InstallType = 'SDK' AND Version ='".convert::raw2sql($version)."' "
			."AND Platform = '".convert::raw2sql($osarch[0])."' "
			."AND Arch     = '".convert::raw2sql($osarch[1])."'");
		return $result;
	}
	public function DownloadSources($type = null, $lang = null, $version = null) {
		if (is_null($type)) $type = $this->Type;
		if (is_null($version)) $version = $this->Version;
		if ($type == "src") return new DataObjectSet(); //don't show sources when sources are explicitly requested
		$result = self::get_downloads("src", null, $version);
		return $result;
	}
	public function RelatedPages($type = null, $version = null) {
		if (is_null($type)) $type = $this->Type;
		if (is_null($version)) $version = $this->Version;
		if (is_null($type) || is_null($version)) return new DataObjectSet();

		$cache = SS_Cache::factory('DownloadSimplePageController');
		if (!($result = unserialize($cache->load($this->SubsiteID . "relatedpages" . sha1($version))))) {
			$tags = array("dl");
			$parts = explode(".", str_replace("rc", ".rc", str_replace("beta", ".beta", $version)));
			$tempver = "";
			for ($i = 0; $i < count($parts); $i++)
				$tags[] = "dlver-".($tempver .= ($i > 0 ? "." : "") . $parts[$i]);
			$temptype = "";
			foreach (explode('-', $type) as $typepart)
				$tags[] = "dltype".($temptype .= "-".$typepart);
			foreach ($tags as $tag)
				$sql[] = "concat(MetaKeywords,',') like '%".convert::raw2sql($tag).",%'";
			$result = DataObject::get("SiteTree", "ClassName<>'VirtualPage' AND (".implode(" OR ", $sql).")", "MenuTitle");
			$cache->save(serialize($result));
		}
		return $result;
	}

	public function getDonatePageLink() {
		Subsite::disable_subsite_filter(true);
		/* get the page with ID 2219, i.e. the english one */
		$donateoriginal = DataObject::get_by_id('SiteTree', 2219);
		$translation = $donateoriginal->getTranslation($this->Locale);
		Subsite::disable_subsite_filter(false);
		if ($translation) {
			return $translation->AbsoluteLink();
		} else {
			return false;
		}
	}
	public function init() {
		Object::add_extension('DataObjectSet', 'DataObjectSetChunked');
		parent::init();
		$this->Type = (isset($_GET["type"]) && array_key_exists($_GET["type"], TypeData::$typenames) ? $_GET["type"] : null);
		$this->Lang = (isset($_GET["lang"]) && preg_match('/^(multi|[a-z]{2,3}(-[A-Z]{2})?)$/', $_GET["lang"]) ? $_GET["lang"] : null);
		$this->Version = (isset($_GET["version"]) && preg_match('/^\d+(\.\d+){2,3}$/', $_GET["version"]) ? $_GET["version"] : null);

		// sample user agents:
		//
		// opensuse: Mozilla/5.0 (X11; Linux x86_64; rv:12.0) Gecko/20100101 Firefox/12.0
		// fedora:   Mozilla/5.0 (X11; Linux x86_64; rv:13.0) Gecko/20100101 Firefox/13.0
		// ubuntu:   Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:13.0) Gecko/20100101 Firefox/13.0
		// Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10
		// Mozilla/5.0 (Windows NT 6.1; WOW64; rv:7.0.1) Gecko/20100101 Firefox/7.0.12011-10-16 20:23:00
		// Mozilla/5.0 (Linux; U; Android 2.3.3; en-au; GT-I9100 Build/GINGERBREAD) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.12011-10-16 20:22:55
		// Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; InfoPath.2; .NET CLR 2.0.50727; .NET CLR 3.0.04506.648; .NET CLR 3.5.21022; .NET CLR 1.1.4322)2011-10-16 20:22:33
		// Mozilla/5.0 (Windows NT 6.1; rv:5.0) Gecko/20100101 Firefox/5.02011-10-16 20:21:42
		// Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_2) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/14.0.835.202 Safari/535.12011-10-16 20:21:13
		// Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0)2011-10-16 20:21:07
		// Mozilla/5.0 (Windows NT 6.1; WOW64; rv:7.0.1) Gecko/20100101 Firefox/7.0.12011-10-16 20:21:05
		// Mozilla/5.0 (X11; Linux i686) AppleWebKit/534.34 (KHTML, like Gecko) rekonq Safari/534.342011-10-16 20:21:01
		// Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0; GTB6; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; OfficeLiveConnector.1.4; OfficeLivePatch.1.3)2011-10-16 20:20:48
		// IE 7 ? Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30)2011-10-16 20:20:09
		// Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.23) Gecko/20110920 Firefox/3.6.23 SearchToolbar/1.22011-10-16 20:20:07

		// Detect platform and language
		$fua = strtolower($_SERVER["HTTP_USER_AGENT"]);
		$al = $_SERVER["HTTP_ACCEPT_LANGUAGE"];
		$ua = strpos($fua, ")") ? substr($fua, 0, strpos($fua, ")")) : $fua;
		$ua = strpos($ua, "(") ? substr($ua, strpos($ua, "(") + 1) : $fua;

		// default to win
		$type = "win-x86";
		if (strpos($ua, "macintosh") !== FALSE || strpos($ua, "mac os") !== FALSE) $type = (strpos($ua, "intel") !== FALSE ? "mac-x86" : "mac-ppc");
		elseif (strpos($ua, "linux") !== FALSE) $type = (strpos($fua, "buntu") !== FALSE || strpos($fua, "debian") !== FALSE || strpos($fua, "mint") !== FALSE || strpos($fua, "iceweasel") !== FALSE ? "deb" : "rpm")."-".(strpos($ua, "x86_64") || strpos($ua, "amd64") ? "x86_64" : "x86");

		// Find langauge candidates
		$langCandidates = array();
		if ($this->Lang) array_push($langCandidates, $this->Lang);
		if (i18n::get_locale() != "en_US") array_push($langCandidates, i18n::get_locale());
		foreach (explode(",", $al) as $value) {
			$parts = explode(";", $value);
			array_push($langCandidates, $parts[0]);
		}
		foreach (explode(";", $ua) as $value) {
			array_push($langCandidates, $value);
		}
		array_push($langCandidates, i18n::get_locale());

		$lang = "";
		if ($type && !$this->Type) {
			$this->Type = $type;
		}
		// Check langauge candidates
		$langs = $this->Languages($type);
		foreach ($langCandidates as $value) {
			$parts = explode("-", str_replace("_", "-", trim(strtolower($value))));
			if (count($parts) > 1 && $langs->find("Lang", $parts[0]."-".strtoupper($parts[1]))) { $lang = $parts[0]."-".strtoupper($parts[1]); break; }
			elseif ($langs->find("Lang", $parts[0])) { $lang = $parts[0]; break; }
		}
		if ($_GET["lang"] != "pick") $this->Lang = $lang;
		// Find newest (stable) version
		$versions = $this->Versions();
		if ($versions->Count()) {
			if (!$this->Version) $this->Version = $versions->find("Type", "stable")->getField("data")->First()->Version ;
		}

		$this->DebugInfo = htmlentities("User-Agent:$fua\nAccept-language:$al\ntype:$type\nLangCand:".implode("|",$langCandidates)."\nlang:$lang\ntype $this->Type - lang $this->Lang - version $this->Version");

		// For top of download page
		$this->DownloadTypeVersionLang =
			($this->Type ? isset(TypeData::$typenames[$this->Type]) ? TypeData::$typenames[$this->Type] : $this->Type : "").
			($this->Version ? ", ".sprintf(_t("DownloadSimplePage.ss.DownloadsVersion", "version %s"), convert::raw2xml($this->Version)) : "").
			($this->Lang ? ", ".convert::raw2xml(LangData::localeName($this->Lang)) : "");
	}
	public function IsDotZero() {
		return substr($this->Version, 4, 1) === "0";
	}
	public function IsDotOne() {
		return substr($this->Version, 4, 1) === "1";
	}
}
