<?php
/**
 * Widget to Search Faqs Pages
 * @package faqs.widgets
 * @author Rui Godinho
 */
class FaqsSearchWidget extends Widget {
    static $db = array(
        "Title" => "Varchar",
        "Limit" => "Int"
    );
      
    static $defaults = array(
        "Title" => "Search Faqs",
        "Limit" => "10"
    );
    
    static $cmsTitle = "Search Faqs";
    static $description = "Search Faqs.";
    
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
            new TextField("Title", _t('FaqsSearchWidget.LABEL', 'Label')),
            new TextField("Limit", _t("FaqsSearchWidget.LIMIT", "Items by page")));
    }
    
    function Title() {
        return $this->Title ? $this->Title :  _t('FaqsTopWidget.TITLE', 'Title');
    }    

    /**
     * List the most viewed faqs
     * @return DataObjectSet
     */
    function FaqsFormWidgetFaqs() {
        $faqsHolder = $this->getFaqsHolder();
        return $faqsHolder->SearchFormForWidget(); 
    }    
}