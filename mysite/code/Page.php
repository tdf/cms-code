<?php
class Page extends SiteTree {

	public static $db = array(
	);

	public static $has_one = array(
	);
	/**
	 * Return a list of all the pages to cache (StaticPublisher)
	 */
	function allPagesToCache() {
		$urls = array();

		// getting all pages from all subsites might be memory intensive
		// depending on number of pages (note from docs)
		Translatable::disable_locale_filter();
		// Forms/Forum pages are dynamic,thus don't cache them
		$pages = Subsite::get_from_all_subsites("SiteTree", "ClassName<>'UserDefinedForm' AND ClassName<>'Forum' AND ClassName<>'ForumHolder' AND ( CanViewType='Anyone' OR CanViewType='Inherit')");
		Translatable::enable_locale_filter();

		// check whether caching makes sense, and what other pages need to be taken care of
		foreach($pages as $page) {
			$urls = array_merge($urls, (array)$page->subPagesToCache());
		}

		// add any custom URLs which are not SiteTree instances
		// need to specify full URL when using domain based export (i.e. subsites), otherwise
		// FilesystemPublisher.php will complain about missing host key
		//$urls[] = "sitemap.xml";

		return $urls;
	}
	/**
	 * Get a list of URLs to cache related to this page
	 */
	function subPagesToCache() {
		$urls = array();

		// add current page, but only when comments are not enabled
		// (otherwise cross-site forgery protection will fail)
		if (!$this->ProvideComments) {
			$urls[] = $this->AbsoluteLink();
		}

		// cache the RSS feed if comments are enabled
		// there's a bug in combination with worfklow, thus disable
		// for now. http://open.silverstripe.org/ticket/6181
		//if ($this->ProvideComments) {
		//  $urls[] = Director::absoluteBaseURL() . "PageComment/rss/" . $this->ID;
		//}

		return $urls;
	}

	function pagesAffectedByChanges() {
		$urls = $this->subPagesToCache();
		if($p = $this->Parent) $urls = array_merge((array)$urls, (array)$p->subPagesToCache());
		//TODO: adapt to complete hierarchy from toplevel to most nested one (navigationlabels)

		return $urls;
	}

}
class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	public static $allowed_actions = array (
	);

	public function init() {
		parent::init();

		// Note: you should use SS template require tags inside your templates 
		// instead of putting Requirements calls here.  However these are 
		// included so that our older themes still work
		Requirements::themedCSS('layout'); 
		Requirements::themedCSS('typography'); 
		Requirements::themedCSS('form'); 
		//enable tranlate-function _t ...
		if($this->dataRecord->hasExtension('Translatable')) {
			i18n::set_locale($this->dataRecord->Locale);
		}
	}

	// override get menus to add fallback to subsite's default language
	public function getMenu($level = 1) {
		if($level == 1) {
			$lang = i18n::default_locale();
			if ($this->SubsiteID) {
				$subsite = DataObject::get_by_ID("Subsite", $this->SubsiteID);
				if ($subsite) {
					$lang = $subsite->getLanguage();
				}
			}
			$result = Translatable::get_by_locale("SiteTree", $lang, "\"ShowInMenus\" = 1 AND \"ParentID\" = 0");
		} else {
			return parent::getMenu($level);
		}

		$visible = array();

		// Remove all entries the can not be viewed by the current user
		// We might need to create a show in menu permission
		if(isset($result)) {
			foreach($result as $page) {
				if($page->hasTranslation(Translatable::get_current_locale())){
					$page = $page->getTranslation(Translatable::get_current_locale());
				} else{
					$page = $page->getTranslation('en_US');
				}
				if (!$page) {
					continue;
				}
				if($page->canView()) {
					$visible[] = $page;
				}
			}
		}
		return new DataObjectSet($visible);
	}

	public function Menu($level = 1) {
		return $this->getMenu($level);
	}
}