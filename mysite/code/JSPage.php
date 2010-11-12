<?php
/**
 * Defines the JSPage page type
 * allows the addition of an additional javascript
 */
class JSPage extends Page {
	// add the field to the database
	static $has_one = array(
			'JS_file' => 'File'
			);
	// show it to the CMS editor page
	function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->addFieldToTab('Root.Content.JavaScript', new FileIFrameField('JS_file'));

		return $fields;
	}
}

class JSPage_Controller extends Page_Controller {
	function init() { 
		parent::init(); 
		if($this->JS_file()->exists()) { 
			Requirements::javascript("".$this->JS_file()->getRelativePath()); 
		}
	} 
}
 
?>
