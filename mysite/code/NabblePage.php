<?php
/**
 */
class NabblePage extends Page {
	public static $db = array(
		'NabbleForum' => 'varchar(7)',
	);
	static $defaults = array(
		'NabbleForum' => '1816769',
	);
	function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Content.Main', new TextField('NabbleForum', "Specify the Nabble-Forum ID to display initially (only the number)"), 'Content');
		return $fields;
	}
}

class NabblePage_Controller extends Page_Controller {
}

?>
