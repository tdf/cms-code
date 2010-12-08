<?php
/**
 * FaqsHolder for Module FAQS
 * The Holder can have sidebar widgets
 * The Holder page list children pages (faqspage) and display a search form 
 * with a listbox that show the FaqsHolder Root Pages. 
 * @package faqs
 */

/**
 * Faqs Holder to display summarised faqs
 * @author Rui Godinho
 */
class FaqsHolder extends Page {
    static $db = array(      
    );
    
    static $has_one = array(
        "SideBar" => "WidgetArea"
    );
    
    static $has_many = array(
    );
    
    static $many_many = array(
    );
    
    /**
     * Indicates what children pages can have
     * Allow FaqsHolder and FaqsPage
     * @staticvar array $allowed_children
     */
    static $allowed_children = array(
        'FaqsPage',
        'FaqsHolder'
    );
    
    function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab("Root.Content.Widgets", new WidgetAreaEditor("SideBar"));
        
        return $fields;
    }
    
    /**
     * Search faqs for at the FaqsHolder.
     * @param int limit A clause to insert into the limit clause.
     * @param int faqsParent Parent Page for query
     * @return DataObjectSet
     */
    public function Entries($limit = '', $search = '', $faqsParent = -1) {    	        
        /**
         * To determine table version to use (Stage or Live)
         * @var string $table
         */
    	$table = (Versioned::current_stage() == "Live") ? "SiteTree_Live" : "SiteTree";        
    	
    	// -- Build search expression
    	if(!empty($search)) { 
            $search = "`$table`.Content LIKE '%$search%' OR `$table`.Title LIKE '%$search%'";
        }
        
        // -- If empty we are at faqsholderpage and should list children pages
        if ($faqsParent < 0) {
        	$faqsParent = $this->ID;        	
        }	                

        /**
         * For Search Query Fiter
         * @var string parentFilter
         */
        $parentFilter = '';
        
        // --  If not full search...
        if ($faqsParent > 0) {
            $parentFilter= "`ParentID` = " . $faqsParent;
            if (!empty($search)) {
                $search = ' AND ' . $search;	
            }             
        }

        // -- For the filter parameter...
        if(empty($parentFilter) && empty($search)) {
        	$search = "`$table`.ID > -1";
        }

        return DataObject::get('FaqsPage', "$parentFilter $search ","`$table`.ParentID, `$table`.Sort",'',"$limit");
    }    
    
    /**
     * Get Most viewed Faqs
     * @param int limit A clause to insert into the limit clause.
     * @return DataObjectSet
     */
    public function TopFaqs($limit = 10) {
    	return DataObject::get("FaqsPage", "", "`FaqsPage`.hits DESC",'',"$limit" );
    }
    
    /**
     * Search form for sidebar widget
     * @return SearchForm
     */
    public function SearchFormForWidget() {
        $searchText = isset($this->Query) ? $this->Query : '';
                
        // -- Form Fields      
        $fields = new FieldSet(new TextField("Search", "", $searchText));
 
        $actions = new FieldSet(new FormAction('FaqsResults', '»'));
        
        return new SearchForm($this, "SearchFaqsFormWidget", $fields, $actions);    	
    }
}

/**
 * Controller Faqs Holder
 * @author Rui Godinho
 *
 */
class FaqsHolder_Controller extends Page_Controller {
    function init() {
        parent::init();
        
        Requirements::themedCSS("faqs");
    }

    /**
     * Get FaqsData Entries
     * @param int $limit Number of items to show for each results page
     * @return DataObjectSet
     */
    function FaqsEntries($limit = 6) {
        $start = isset($_GET['start']) ? (int) $_GET['start'] : 0;
        $faqsParent = isset($_GET['parent']) ? (string) $_GET['parent'] : 0;
        $search = isset($_GET['Search']) ? (string) $_GET['Search'] : '';
        // -- If no parent then can be a full faqspage's search
        if (empty($faqsParent)) {
            $checkfullsearch = isset($_GET['action_FaqsResults']) ? (string) $_GET['action_FaqsResults'] : '';
            if ($checkfullsearch === '»') {
            	$faqsParent = 0;
            }
        }
        return $this->Entries("$start,$limit", $search, $faqsParent);
    }

    /**
     * Get the results for the FaqsHolder Page 
     * @param int $limit Number of items to show for each results page
     * @return DataObjectSet
     */
    function Results($limit = 6) {
        return $this->FaqsEntries($limit);
    }
    
    /**
     * Build the Search Faqs Form 
     * @return Form
     */
    function SearchFaqsForm() {
        $searchText = isset($this->Query) ? $this->Query : '';
        
        /**
         * Array to holder Children of FaqsHolder for the form listbox
         * @var array
         */
        $dataToList = array();        
        
        /**
         * Get FaqsHolder Root Pages
         * @var Object faqsRootHolder
         */
        $faqsRootHolder = DataObject::get("FaqsHolder", "ParentID = 0");        
  
        if (!is_null($faqsRootHolder)) {
	        // -- Find all the Children of root FaqsHolderPages
	        foreach ($faqsRootHolder as $faqsRoot) {
	            $rootToList[$faqsRoot->ID] = $faqsRoot->Title;
	
		        /**
		         * Children Pages
		         * Get Children Pages of FaqsHolder
		         * @var Object
		         */                 
	            $faqsChildren = $this->ChildrenOf($faqsRoot->ID);
	
		        // --  Get children for Listbox
		        foreach ($faqsChildren as $faqsData) {
		            $dataToList[$faqsData->ID] = $faqsData->Title;
		        }
	        }        
        }

        // -- Form Fields      
        $fields = new FieldSet(
        new TextField("Search", _t('FaqsHolder.SEARCHTITLE', 'Search'), $searchText),
        new ListboxField(
        $name = "parent",
        $title = _t('FaqsHolder.SEARCHSELCATEGORY', 'Select Faqs Category'),
        $source = $dataToList,
        $value = 1));
                               
        $actions = new FieldSet(new FormAction('FaqsResults', _t('FaqsHolder.SEARCHBUTTONLABEL', 'Pesquisar')));
        
        return new SearchForm($this, "SearchFaqsForm", $fields, $actions);
    }
   
    /**
     * Get the results for the view
     * @param $data
     * @param $form
     * @return ViewableData
     */
    function FaqsResults($data, $form){
    	$data = array(
         'Results' => $this->FaqsEntries(),
         'Query' => $form->getSearchQuery(),
         'Title' => _t('FaqsHolder.SEARCHRESULTS', 'Faqs Search Results'));
        return $this->customise($data)->renderWith(array('FaqsHolder', 'FaqsSearchResults', 'Page'));
    }    
}