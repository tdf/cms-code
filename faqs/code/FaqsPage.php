<?php
/**
 * File for the FaqsPage Class and Controller
 * @package faqs
 */

/**
 * Class for Page Type to display FAQS.
 * @uses MultiSelectField Module
 * @author Rui Godinho
 * @version 1.00
 */
class FaqsPage extends Page {
	/**
	 * New fields for the CMS
	 * @var array $db
	 */
	public static $db = array(
	   'hits' => 'Int',
	   'counthits' => 'Boolean',
	);
    
	/**
	 * 
	 * @var array $has_one
	 */
	public static $has_one = array(
	);
    
	/**
	 * Variable for Related Pages 
	 * @var array $many_many
	 */
	static $many_many = array ('FaqsRelated'=>'FaqsPage');
	
	/**
	 * Get Fields for the CMS
	 * @return FieldSet
	 * @see sapphire/core/model/SiteTree#getCMSFields()
	 */
	function getCMSFields() 
	{
	    $fields = parent::getCMSFields();

	    // -- Rename Title Fields
        $fields->renameField("Title", _t("FaqsPageEntry.QUESTIONLABEL", "Question"));
	    $fields->renameField("Content", _t("FaqsPageEntry.ANSWERLABEL", "Answer"));
        
        // -- Counting Faqs Hits
        $fields->addFieldToTab('Root.Behaviour', new NumericField(
        'hits', _t("FaqsPageEntry.HITSLABEL", 'Hits'), 0));        	    

        // -- Related Faqs
        $tablefield = new ManyManyComplexTableField($this,'FaqsRelated', 'FaqsPage', 
        array('Title' => 'Question', 'URLSegment' => 'URL'), 'getCMSFields_forPopup');

        // --Don't allow FaqsPage edition, only show 
		$tablefield->setPermissions(array('show'));
 
		$fields->addFieldToTab( 'Root.Content.FaqsRelated', $tablefield );
       
        return $fields;
	}

    /**
     * Get the sidebar from the FaqsHolder
     * @return SideBar
     */
    function SideBar() {
        return $this->getParent()->SideBar();
    }
	
    /**
     * Get Faq Firsts paragraph for summary
     * @return String HTML
     */
    function ParagraphSummary(){
            return $this->obj('Content')->FirstParagraph('html');
    }
    	
	/**
	 * Control FaqsPage Hits
	 * Remarks: Can be improved to avoid counting for refresh pages.
	 * @param $cid Content ID
	 * @return void
	 */
	public static function hitting($cid) {
		  $faqsData = DataObject::get_by_id('FaqsPage', $cid);
       
	        // -- Should write for both table data
	        if($faqsData) {
	            $faqsData->hits = $faqsData->hits + 1;  // -- Hits counting
	            $faqsData->writeToStage('Stage');
				$faqsData->Publish('Stage', 'Live');
				$faqsData->Status = "Published";        	            
	        }
	}
}

/**
 * FaqsPage Controller
 * @author Rui Godinho
 * @package faqs.controller
 */
class FaqsPage_Controller extends Page_Controller {
    
	/**
	 * Controller Initializer. Calls Parent init method
	 * @return void
	 * @see mysite/code/Page_Controller#init()
	 */
    function init() {
        parent::init();
        Requirements::themedCSS('faqs');
        
        // -- A race to most viewed faqs...
        FaqsPage::hitting($this->ID);
    }       
}