<?php
/**
 * DownloadPage, defines some controls to be used in the template
 */
class DownloadPage extends Page {
}

class DownloadPage_Controller extends Page_Controller {
	protected static $stable_or_testing = 'stable';
	public static function Langdropdown() {
		return new DropdownField('lang', 'Language Select', DataObject::get("Download","Type = '".static::$stable_or_testing."' AND Lang <> 'all' AND Lang <> 'multi'")->map('Lang', 'langForDropdown',null,True));
	}
	public static function SourcesDB() {
		return DataObject::get("Download", "Type = 'src' AND Version <> '3.3.4'", "Version DESC");
	}
	public static function SdkDB() {
		return DataObject::get("Download", "Type = '".static::$stable_or_testing."' AND InstallType = 'SDK' AND Version <> '3.3.4'", "Version DESC, Platform DESC, Arch");
	}
	public static function LiboDB() {
		return DataObject::get("Download", "Type = '".static::$stable_or_testing."' AND InstallType = 'Full' AND Version <> '3.3.4'", "Version DESC, Platform DESC, Arch");
	}
}
