<?php
/**
 * RSS Widget settings
 */
class RSSWidget2 extends DataObject {

	static $db = array(
		'RSSHeader' => 'Varchar(255)',
		'RSSFeed' => 'Varchar(255)',
		'RSSLink' => 'Varchar(255)',
		'RSSWidth' => 'Int',
		'RSSHeight' => 'Int',
		'RSSFrameBackground' => 'Varchar(7)',
		'RSSFrameColor' => 'Varchar(7)',
		'RSSBackground' => 'Varchar(7)',
		'RSSColor' => 'Varchar(7)',
		'RSSLinkColor' => 'Varchar(7)'
	);

	function getCMSFields_forPopup() {
		$fields = new FieldSet(
			new TextField('RSSHeader', "the header text"),
			new TextField('RSSFeed', 'URL of the feed'),
			new TextField('RSSLink','link to website of feed'),
			new TextField('RSSWidth', 'width of the widget'),
			new TextField('RSSHeight', 'height of the widget (use same as twitter widget)'),
			new TextField('RSSFrameBackground', "frame background color"),
			new TextField('RSSFrameColor', "frame text color"),
			new TextField('RSSBackground', 'content background color'),
			new TextField('RSSColor', 'content text color'),
			new TextField('RSSLinkColor', 'content link color')
		);
		return $fields;
	}

	function forTemplate() {
		$this->Feed = new DataObjectSet();

		include_once(Director::getAbsFile(SAPPHIRE_DIR . '/thirdparty/simplepie/simplepie.inc')); 

		$feed = new SimplePie($this->RSSFeed, TEMP_FOLDER); 
		$feed->init(); 
		if($items = $feed->get_items(0, 3)) { 
			foreach($items as $item) { 

				// Cast the Date 
				$date = new Date('Date'); 
				$date->setValue($item->get_date());

				// Cast the Title 
				$title = new Text('Title'); 
				$title->setValue($item->get_title()); 

				// Cast the description and strip 
				$desc = new Text('Description'); 
				//$desc->setValue(strip_tags($item->get_description()));
				$desc->setValue(preg_replace("# ((http|https|ftp)://(\S*?\.\S*?))(\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)#ie", "' <a href=\"$1\" target=\"_blank\">$3</a>$4'", $item->get_description()));

				$this->Feed->push(new ArrayData(array( 
								'Title'         => $title, 
								'Date'         => $date, 
								'Link'         => $item->get_link(), 
								'Description'   => $desc 
								))); 
			} 
			return $this->renderWith("RSSWidget2"); 
		} 
		return false;
	}
}
?>
