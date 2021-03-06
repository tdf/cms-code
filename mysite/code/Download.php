<?php
/**
 * for Downloads - as available via rsync
 */
class Download extends DataObject {
/* <perms> <Size> <timestamp> libreoffice/<Type:box,portable>/<Version>/<Filename> */
/* <perms> <Size> <timestamp> libreoffice/<Type:src>/<Filename> */
/* <perms> <Size> <timestamp> libreoffice/<Type:stable,testing>/<Version>/<Filename> */
	static $db = array(
		'Type' => 'Varchar(20)', /* box, portable, src, stable, testing */
		'Platform' => 'Varchar(10)', /* deb, rpm, win, mac, multi (box) */
		'Arch' => 'Varchar(10)', /* x86, x86_64, ppc, multi (box) */
		'Version' => 'Varchar(20)', /* 3.3.0, 3.3.1-rc2, 3.3.0.4 (Sources),...*/
		'Size' => 'DBFileSize',  /* varchartype not int because of dvd-isos, larger than int-type */
		'Fullpath' => 'Varchar(256)', /* redundant, but as the scheme differs between type... */
		'Filename' => 'Varchar(100)', /* redundant, but as the scheme differs between type... */
		'InstallType' => 'Varchar(20)', /* Full, Helppack, Languagepack, SDK */
		'Lang' => 'Varchar(10)', /* multi/all_lang (win), en-US,...pt-BR,... */ 
		);
	private static $platformnames= array (
		"win/x86"    => array("Nice" => "Windows",          "fortemplate" => "winx86"),
		"deb/x86"    => array("Nice" => "Linux x86 (deb)",  "fortemplate" => "debx86"),
		"deb/x86_64" => array("Nice" => "Linux x64 (deb)",  "fortemplate" => "debx86_64"),
		"rpm/x86"    => array("Nice" => "Linux x86 (rpm)",  "fortemplate" => "rpmx86"),
		"rpm/x86_64" => array("Nice" => "Linux x64 (rpm)",  "fortemplate" => "rpmx86_64"),
		"mac/ppc"    => array("Nice" => "Mac OS X (PPC)",   "fortemplate" => "macppc"),
		"mac/x86"    => array("Nice" => "Mac OS X (Intel)", "fortemplate" => "macintel")
		);
	public function NicePlatform() {
		return self::$platformnames[$this->Platform."/".$this->Arch]["Nice"];
	}
	public function NiceLang() {
		return ucfirst(i18n::get_language_name($this->Lang, true));
	}
	public function Helppacks() {
		$cache = SS_Cache::factory("Download");
		if (!($return = unserialize($cache->load(str_replace(array(".", "-"), "_", "-helppacks-$this->Type-$this->Version-$this->Platform-$this->Arch"))))) {
			$return = DataObject::get("Download", "Type = '".$this->Type."' AND Version = '".$this->Version."' AND InstallType = 'Helppack' AND Platform = '".$this->Platform."' AND Arch ='".$this->Arch."'", 'Lang');
			$cache->save(serialize($return));
		}
		return $return;
	}
	public function Langpacks() {
		$cache = SS_Cache::factory("Download");
		if (!($return = unserialize($cache->load(str_replace(array(".", "-"), "_", "-langpacks-$this->Type-$this->Version-$this->Platform-$this->Arch"))))) {
			$return = DataObject::get("Download", "Type = '".$this->Type."' AND Version = '".$this->Version."' AND InstallType = 'Languagepack' AND Platform = '".$this->Platform."' AND Arch ='".$this->Arch."'", 'Lang');
			$cache->save(serialize($return));
		}
		return $return;
	}
	public function langForDropdown() {
		return $this->Lang." - ".Convert::html2raw(self::NiceLang());
	}
	/* change default of persistent-parameter to avoid invalidating the cache on each save */
	public function flushCache($persistent = False) {
		parent::flushCache($persistent);
	}
	/* workaround for SS 2.4 limitations that can only substitute one single parameter in templates */
	public function PlainLink() {
		return "<a href='http://download.documentfoundation.org/$this->Fullpath'>$this->Filename</a>";
	}
	public function ButtonLabel($fallback = false) {
		if ($this->InstallType == "Full") {
			return _t("DownloadSimplePage.ss.DownloadsInstallTypeFull", "Main installer");
		} elseif ($this->InstallType == "Languagepack" ) {
			return _t("DownloadSimplePage.ss.DownloadsInstallTypeLanguagepack", "Translated user interface");
		} elseif ($this->InstallType == "Helppack" ) {
			if ($fallback) {
				return _t("DownloadSimplePage.ss.DownloadsInstallTypeHelppackFallback", "LibreOffice built-in help (English fallback)");
			} else {
				return _t("DownloadSimplePage.ss.DownloadsInstallTypeHelppack", "LibreOffice built-in help");
			}
		} else {
			return $this->Filename;
		}
	}
}
