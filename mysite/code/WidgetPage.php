<?php
/**
 * A pagetype that allows adding RSS & Twitter Widgets
 */
class WidgetPage extends Page {
	static $db = array(
			'ContentBelow' => "HTMLText",
			);
	static $has_one = array(
			"MyTwitterWidget" => 'TwitterWidget',
			"MyRSSWidget" => 'RSSWidget2',
			"MyBottomRSSWidget" => 'RSSWidget2'
			);

	function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab("Root.Content.Main", new HtmlEditorField("ContentBelow", "Content to display below the widget block"));
		$rsstablefield = new HasOneComplexTableField(
				$this,
				'MyRSSWidget',
				'RSSWidget2',
				array(
					'RSSHeader' => 'Title',
					'RSSLink' => 'Link'
				     ),
				'getCMSFields_forPopup'
				);
		$rsstablefield->setAddTitle( 'new RSS configuration' );
		$rsstablefield->joinField = 'MyRSSWidgetID';
		$fields->addFieldToTab( 'Root.Content.RSS', $rsstablefield );

		$rssbottomtablefield = new HasOneComplexTableField(
				$this,
				'MyBottomRSSWidget',
				'RSSWidget2',
				array(
					'RSSHeader' => 'Title',
					'RSSLink' => 'Link'
				     ),
				'getCMSFields_forPopup'
				);
                $rssbottomtablefield->setAddTitle( 'new RSS configuration' );
                $rssbottomtablefield->joinField = 'MyBottomRSSWidgetID';
                $rssbottomtablefield->setPermissions(array('edit','show'));
		$fields->addFieldToTab( 'Root.Content.RSS', new LabelField("RSSBottomLabel", "the RSS to display below the widget area"));
		$fields->addFieldToTab( 'Root.Content.RSS', $rssbottomtablefield );
		
		//$dropdown = new DropdownField(
  		//	  'MyRSSWidgetID',
		//	    'What feed shall be displayed in the Widget-Area',
		//    			Dataobject::get("RSSWidget")->map("ID", "RSSHeader", "Please Select one")
		//	);
		//$fields->addFieldToTab( 'Root.Content.RSS', $dropdown );
		//$fields->addFieldToTab( 'Root.Content.RSS', new LabelField("RSSrelation", "the relation is determined as ".$rsstablefield->getParentIdName("WidgetPage","RSSWidget")));
		$tablefield = new HasOneComplexTableField(
				$this,
				'MyTwitterWidget',
				'TwitterWidget',
				array(
					'TwitterType' => 'Widget Type Name',
					'TwitterUser' => 'Twitter user',
					'SearchPhrase' => 'Twitter Search'
				     ),
				'getCMSFields_forPopup'
				);
		$tablefield->setAddTitle( 'new Twitter Widget variants' );

		$fields->addFieldToTab( 'Root.Content.Twitter', $tablefield );
		return $fields;
	}
}

class WidgetPage_Controller extends Page_Controller {
}

?>
