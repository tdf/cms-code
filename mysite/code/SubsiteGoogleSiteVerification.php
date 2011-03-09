<?php
/**
 * use as $Subsite.GoogleSiteVerification in the <head> section
 */
class SubsiteGoogleSiteVerification extends DataObjectDecorator {
	function extraStatics() {
		return array(
			'db' => array('GoogleSiteVerification' => 'HTMLVarchar(100)'),
			'summary_fields' => array('GoogleSiteVerificationRAW' => 'Google Site Verification meta-Tag'),
		);
	}
	public function updateCMSFields(FieldSet $fields) {
		$fields->addFieldToTab('Root.Configuration', new TextField('GoogleSiteVerification', 'Google Site Verification meta-Tag',null,100), 'Language');
	}
	public function getGoogleSiteVerificationRAW() {
		/* HTML gets interpreted by the summary table, thus escape it as xml-string */
		return $this->owner->obj("GoogleSiteVerification")->XML();
	}
}
