<?php
/**
 * DownloadTestingPage, defines some controls to be used in the template
 */
class DownloadTestingPage extends DownloadPage {
}

class DownloadTestingPage_Controller extends DownloadPage_Controller {
	protected static $stable_or_testing = 'testing';
	/* don't show Source-DL or SDK-DL on testing page */
	public static function SourcesDB() {
		return False;
	}
	public static function SdkDB() {
		return False;
	}
}
