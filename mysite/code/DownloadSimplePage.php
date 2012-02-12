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
		"deb-x86_64"   => "Linux - deb (64-bit)",
		"rpm-x86"      => "Linux - rpm (x86)",
		"rpm-x86_64"   => "Linux - rpm (64-bit)",
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
	public function getName() {
		$name = ucfirst(i18n::get_language_name($this->Lang, false)); 
		return $name ? $name : $this->Lang;
	}
	public function getLink() {
		return Controller::curr()->Link()."?".
			(isset($_GET["type"]) ? "type=".urlencode($_GET["type"])."&" : "").
			"lang=".urlencode($this->Lang).
			(isset($_GET["version"]) ? "&version=".urlencode($_GET["version"]) : "");
	}
}
class VersionData extends ArrayData {
	public function getLink() {
		return Controller::curr()->Link()."?".
			(isset($_GET["type"]) ? "type=".urlencode($_GET["type"])."&" : "").
			(isset($_GET["lang"]) ? "lang=".urlencode($_GET["lang"])."&" : "").
			"version=".urlencode($this->Version);
	}
}
class DownloadData extends ArrayData {
	public function getSizeNice() {
		return File::format_size($this->Size);
	}
}

class DownloadSimplePage extends Page {
}
class DownloadSimplePage_Controller extends Page_Controller {
	private static $multiLangs = array("en-US","ar","ast","be-BY","bg","bn","bo","br","ca","ca-XV","cs","da","de","dz","el","en-GB","es","et","eu","fi","fr","gl","gu","he","hi","hr","hu","is","it","ja","km","kn","ko","lt","lv","mr","nb","nl","oc","om","or","pl","pt","pt-BR","ru","sh","si","sk","sl","sr","sv","te","tr","ug","vi","zh-CN","zh-TW");

	private function WhereClause($type, $lang, $version) {
		$types = explode('-', $type);
		$brVersion = !is_null($version) && substr($version, -3) == "-br";
		return (!is_null($type) ? (count($types)==1 ?
				"AND Type='".convert::raw2sql($types[0])."' " :
				"AND Platform='".convert::raw2sql($types[0])."' AND Arch='".convert::raw2sql($types[1])."' ") : "").
			(!is_null($lang) ? "AND (Lang='".convert::raw2sql($lang)."'".($brVersion ? " OR FullPath LIKE '%\\_".convert::raw2sql($lang)."%'" : "").") " : "").
			(!is_null($version) ?
				"AND Version='".convert::raw2sql(str_replace('-br', '', $version))."' ".
				"AND FullPath ".($brVersion ? "" : "NOT ")."LIKE '%/BrOffice%'" : "");
	}
	public function Types() {
		$cache = SS_Cache::factory('DownloadSimplePageController');
		if (!($result = @unserialize($cache->load("types")))) {
			$rows = DB::query("SELECT distinct case when Type in ('stable','testing','portable') then concat(Platform,'-',Arch) else Type end Type, PlatForm, Arch ".
				"FROM Download");
			$result = new DataObjectSet();
			foreach ($rows as $row)
				$result->push(new TypeData($row));
			$cache->save(serialize($result));
		}
		$result->sort("Order");
		return $result;
	}
	public function Languages($type = null) {
		if (is_null($type)) $type = $this->Type;
		if (is_null($type)) return new DataObjectSet();
		
		$cache = SS_Cache::factory('DownloadSimplePageController');
		if (!($result = @unserialize($cache->load("languages" . sha1($type))))) {
			$rows = DB::query("SELECT distinct Lang ".
				"FROM Download WHERE Lang NOT IN ('all','multi') ".self::WhereClause($type, null, null)."ORDER BY Lang");
			$result = new DataObjectSet();
			foreach ($rows as $row)
				$result->push(new LangData($row));
			$cache->save(serialize($result));
		}
		$result->sort("Name");
		return $result;
	}
	public function Versions($type = null, $lang = null) {
		if (is_null($type)) $type = $this->Type;
		if (is_null($lang)) $lang = $this->Lang;
		if (is_null($type) || ($type != "box" && $type != "src" && is_null($lang))) return new DataObjectSet();
		
		$cache = SS_Cache::factory('DownloadSimplePageController');
		if (!($result = @unserialize($cache->load("versions" . sha1($type."-".$lang))))) {
			$rows = DB::query("SELECT distinct concat(Version, case when FullPath LIKE '%/BrOffice%' then '-br' else '' end) Version, ".
				" CASE WHEN Type='testing' OR Version LIKE '%rc%' OR Version LIKE '%beta%' THEN 'testing' ELSE 'stable' END Type ".
				"FROM Download WHERE 1=1 ".self::WhereClause($type, $lang, null)."ORDER BY Type, Version DESC");
			$result = new DataObjectSet();
			foreach ($rows as $row)
				$result->push(new VersionData($row));
			$result->First()->Recommended = true;
			$cache->save(serialize($result));
		}
		return $result;
	}
	public function Downloads($type = null, $lang = null, $version = null) {
		if (is_null($type)) $type = $this->Type;
		if (is_null($lang)) $lang = $this->Lang;
		if (is_null($version)) $version = $this->Version;
		if (is_null($type) || ($type != "box" && $type != "src" && is_null($lang)) || is_null($version)) return new DataObjectSet();
		
		$cache = SS_Cache::factory('DownloadSimplePageController');
		if (!($result = @unserialize($cache->load("downloads" . sha1($type."-".$lang."-".$version))))||true) {
			$useMulti = strpos($version, "3.3.") === FALSE || in_array($lang, static::$multiLangs);
			$rows = $type != "box" && $type != "src" ?
				DB::query("SELECT InstallType, Fullpath, Size, Type FROM (".
				"SELECT InstallType, Fullpath, Size, Type, 1 Idx FROM Download WHERE InstallType='Full' ".self::WhereClause($type, ($type == "win-x86" ? ($useMulti ? "multi" : "all") : null), $version)." UNION ALL ".
				"SELECT InstallType, Fullpath, Size, Type, 2 Idx FROM Download WHERE InstallType='Languagepack' ".self::WhereClause($type, $lang, $version)." UNION ALL ".
				"SELECT InstallType, Fullpath, Size, Type, 3 Idx FROM Download WHERE InstallType='Helppack' ".self::WhereClause($type, $lang, $version)." UNION ALL ".
				"SELECT 'Helppack (English fallback)' InstallType, Fullpath, Size, Type, 4 Idx FROM Download WHERE InstallType='Helppack' ".self::WhereClause($type, "en-us", $version).
					" AND NOT EXISTS(SELECT * FROM Download WHERE InstallType='Helppack' ".self::WhereClause($type, $lang, $version).")) t ".
				"ORDER BY Idx") :
				DB::query("SELECT Filename InstallType, Fullpath, Size, Type FROM Download WHERE 1=1 ".self::WhereClause($type, null, $version)." ORDER BY Fullpath");
			$main = new DataObjectSet();
			foreach ($rows as $row)
				$main->push(new DownloadData($row));
			$IsPreRelease = ($main->First() && $main->First()->Type == "testing") || strpos($version, 'rc') !== FALSE || strpos($version, 'beta') != FALSE;

			$result = new ArrayData(array(
				"Files" => $main,
				"IsPreRelease" => $IsPreRelease,
			));
			$cache->save(serialize($result));
		}
		return $result;
	}
	public function DownloadPortables($type = null, $lang = null, $version = null) {
		if (is_null($type)) $type = $this->Type;
		if (is_null($lang)) $lang = $this->Lang;
		if (is_null($version)) $version = $this->Version;
		if (is_null($type) || ($type != "box" && $type != "src" && is_null($lang)) || is_null($version)) return new DataObjectSet();
		
		$cache = SS_Cache::factory('DownloadSimplePageController');
		if (!($result = @unserialize($cache->load("downloadportables" . sha1($type."-".$lang."-".$version))))) {
			$portableLangs = array("zh-CN","zh-TW","nl","en-US","en-GB","fr","de","hu","it","ja","ko","pl","pt","pt-BR","ru","es");
			$result = new DataObjectSet();
			if (in_array($lang, static::$multiLangs)) { // Assume that the 58 languages in MultilingualAll are the same as in 3.3.x, windows, multi installer
				$rows = DB::query("SELECT InstallType, Fullpath, Size, Type FROM Download WHERE Type='portable' ".
					self::WhereClause($type, null, $version).
					"AND FullPath LIKE '%Multilingual".(in_array($lang, $portableLangs) ? "Normal" : "All")."%'");
				foreach ($rows as $row)
					$result->push(new DownloadData($row));
			}
			$cache->save(serialize($result));
		}
		return $result;
	}
	public function DownloadIsos($type = null, $lang = null, $version = null) {
		if (is_null($type)) $type = $this->Type;
		if (is_null($lang)) $lang = $this->Lang;
		if (is_null($version)) $version = $this->Version;
		if (is_null($type) || is_null($lang) || is_null($version)) return new DataObjectSet();
		
		$cache = SS_Cache::factory('DownloadSimplePageController');
		if (!($result = @unserialize($cache->load("downloadisos" . sha1($type."-".$lang."-".$version))))) {
			$rows = DB::query("SELECT InstallType, Fullpath, Size, Type, Lang ".
				"FROM (SELECT case ".
				" when FullPath like '%Win%' then 'win' ".
				" when FullPath like '%Linux-DEB32%' then 'deb-x86' ".
				" when FullPath like '%Linux-DEB64%' then 'deb-x86_64' ".
				" when FullPath like '%Linux-RPM32%' then 'deb-x86' ".
				" when FullPath like '%Linux-RPM64%' then 'deb-x86_64' ".
				" when FullPath like '%allplatforms%' then 'multi' ".
				" when FullPath like '%WLM%' then 'multi' end Type, ".
				" case when FullPath like '%CD%' then 'CD' when FullPath like '%DVD%' then 'DVD' else 'Other' end InstallType, ".
				" case when FullPath like '%\\_de.%' then 'de' else 'multi' end Lang, ".
				" Version, FullPath, Size FROM Download WHERE Type='box') t ".
				"WHERE Type IN ('".convert::raw2sql($type)."','multi')".
				"AND Lang IN ('".convert::raw2sql($lang)."','multi')".
				"AND Version IN ('".convert::raw2sql($version)."','multi')");
			$result = new DataObjectSet();
			foreach ($rows as $row)
				$result->push(new DownloadData($row));
			$cache->save(serialize($result));
		}
		return $result;
	}
	public function DownloadSdks($type = null, $lang = null, $version = null) {
		if (is_null($type)) $type = $this->Type;
		if (is_null($lang)) $lang = $this->Lang;
		if (is_null($version)) $version = $this->Version;
		if (is_null($type) || ($type != "box" && $type != "src" && is_null($lang)) || is_null($version)) return new DataObjectSet();
		
		$cache = SS_Cache::factory('DownloadSimplePageController');
		if (!($result = @unserialize($cache->load("downloadsdks" . sha1($type."-".$lang."-".$version))))) {
			$rows = DB::query("SELECT InstallType, Fullpath, Size, Type FROM Download WHERE InstallType='SDK' ".
				self::WhereClause($type, null, $version));
			$result = new DataObjectSet();
			foreach ($rows as $row)
				$result->push(new DownloadData($row));
			$cache->save(serialize($result));
		}
		return $result;
	}
	public function DownloadSources($type = null, $lang = null, $version = null) {
		if (is_null($type)) $type = $this->Type;
		if ($type == "src") return new DataObjectSet(); 
		$result = $this->Downloads("src", null, $version);
		return $result->Files;
	}
	public function RelatedPages($version = null) {
		if (is_null($version)) $version = $this->Version;
		if (is_null($version)) return new DataObjectSet();
		
		$cache = SS_Cache::factory('DownloadSimplePageController');
		if (!($result = @unserialize($cache->load("relatedpages" . sha1($version))))) {
			$parts = explode(".", ".".str_replace("rc", ".rc", str_replace("beta", ".beta", $version)));
			$tempver = "";
			$sql = array();
			for ($i = 0; $i < count($parts); $i++) {
				$tempver .= ($i > 1 ? "." : "") . $parts[$i];
				$sql[] = "MetaKeywords like '%download".convert::raw2sql($tempver)."'";
				$sql[] = "MetaKeywords like '%download".convert::raw2sql($tempver).",%'";
			}
			$result = DataObject::get("SiteTree", "(".implode(" OR ", $sql).")", "MenuTitle");
			$cache->save(serialize($result));
		}
		return $result;
	}

	public function init() {
		Object::add_extension('DataObjectSet', 'DataObjectSetChunked');
		parent::init();
		$this->Type = (isset($_GET["type"]) && $_GET["type"] != "" ? $_GET["type"] : null);
		$this->Lang = (isset($_GET["lang"]) && $_GET["lang"] != "" ? $_GET["lang"] : null);
		$this->Version = (isset($_GET["version"]) && $_GET["version"] != "" ? $_GET["version"] : null);

		if (!$this->Type && !$this->Version && !isset($_GET["nodetect"])) {
			// Detect platform and language
			$fua = strtolower($_SERVER["HTTP_USER_AGENT"]);
			$ua = strpos($fua, ")") ? substr($fua, 0, strpos($fua, ")")) : $fua;
			$ua = strpos($ua, "(") ? substr($ua, strpos($ua, "(") + 1) : $fua;

			$type = "";
			$lang = "";
			if (strpos($ua, "windows") !== FALSE || strpos($ua, "win32") !== FALSE) $type = "win-x86";
			elseif (strpos($ua, "macintosh") !== FALSE || strpos($ua, "mac os") !== FALSE) $type = (strpos($ua, "intel") !== FALSE ? "mac-x86" : "mac-ppc");
			elseif (strpos($ua, "linux") !== FALSE) $type = (strpos($fua, "buntu") !== FALSE || strpos($fua, "debian") !== FALSE || strpos($fua, "iceweasel") !== FALSE ? "deb" : "rpm")."-".(strpos($ua, "x86_64") || strpos($ua, "amd64") ? "x86_64" : "x86");
			if ($type) {
				$langCandidates = array();
				if ($this->Lang) array_push($langCandidates, $this->Lang);
				if (i18n::get_locale() != "en_US") array_push($langCandidates, i18n::get_locale());
				foreach (explode(",", $_SERVER["HTTP_ACCEPT_LANGUAGE"]) as $value) {
					$parts = explode(";", $value);
					array_push($langCandidates, $parts[0]);
				}
				foreach (explode(";", $ua) as $value) {
					array_push($langCandidates, $value);
				}
				array_push($langCandidates, i18n::get_locale());

				// Check candidates
				$langs = $this->Languages($type);
				foreach ($langCandidates as $value) {
					$parts = explode("-", str_replace("_", "-", trim(strtolower($value))));
					if (count($parts) > 1 && $langs->find("Lang", $parts[0]."-".strtoupper($parts[1]))) { $lang = $parts[0]."-".strtoupper($parts[1]); break; }
					elseif ($langs->find("Lang", $parts[0])) { $lang = $value; break; }
				}
				$versions = $this->Versions($type, $lang);
				if ($versions->Count()) {
					$this->Type = $type;
					$this->Lang = $lang;
					$this->Version = $versions->First()->Version;
				}
			}
		}

		// For top of download page
		if ($this->Type) $this->TypeName = isset(TypeData::$typenames[$this->Type]) ? TypeData::$typenames[$this->Type] : $this->Type;
		if ($this->Lang) $this->LangName = ucfirst(i18n::get_language_name($this->Lang, false));
		if ($this->Version) $this->VersionName = $this->Version;
	}
}
