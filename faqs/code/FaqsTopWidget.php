<?php
/**
 * Widget to display the most viewed Faqs
 * @package faqs.widgets
 * @author Rui Godinho
 */
class FaqsTopWidget extends Widget {
    static $db = array(
        "Title" => "Varchar",
        "Limit" => "Int"
    );
      
    static $defaults = array(
        "Title" => "Top Faqs",
        "Limit" => "0"
    );
    
    static $cmsTitle = "Top Faqs";
    static $description = "Shows the most viewed faqs.";
    
    function getFaqsHolder() {
        $page = Director::currentPage();
        
        if($page->is_a("FaqsHolder")) {
            return $page;
        } else if($page->is_a("FaqsPage") && $page->getParent()->is_a("FaqsHolder")) {
            return $page->getParent();
        } else {
            return DataObject::get_one("FaqsHolder");
        }
    }
    
    function getCMSFields() {
        return new FieldSet(
            new TextField("Title", _t('FaqsTopWidget.LABEL', 'Label')),
            new TextField("Limit", _t("FaqsTopWidget.LIMIT", "Max to show")));
    }
    
    function Title() {
        return $this->Title ? $this->Title :  _t('FaqsTopWidget.TITLE', 'Title');
    }    

    /**
     * List the most viewed faqs
     * @return DataObjectSet
     */
    function ListTopFaqs() {
        $faqsHolder = $this->getFaqsHolder();

        return $faqsHolder->TopFaqs($this->Limit); 
    }    
}