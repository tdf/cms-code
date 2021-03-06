<?php
class SubsitePiwik extends DataObjectDecorator {
	function extraStatics() {
		return array(
			'db' => array('PiwikID' => 'Int'),
			'summary_fields' => array('PiwikID' => 'Piwik ID'),
			);
	}
	public function updateCMSFields(FieldSet $fields) {
		$fields->addFieldToTab('Root.Configuration', new NumericField('PiwikID', 'Piwik Site-ID'),'Language');
	}
}
