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
		return DataObject::get("Download", "Type = 'src'", "Version DESC");
	}
	public static function SdkDB() {
		return DataObject::get("Download", "Type = '".static::$stable_or_testing."' AND InstallType = 'SDK'", "Version DESC, Platform DESC, Arch");
	}
	public static function LiboDB() {
		return DataObject::get("Download", "Type = '".static::$stable_or_testing."' AND InstallType = 'Full'", "Version DESC, Platform DESC, Arch");
	}
}
