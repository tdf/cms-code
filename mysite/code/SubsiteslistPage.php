<?php
/**
 * Gets the non-english subsites (i.e. the NL-Projects)
 */
class SubsiteslistPage extends Page {
}

class SubsiteslistPage_Controller extends Page_Controller {
	function Content() {
		return str_replace('$SubsiteList', $this->renderWith("Subsiteslist"), $this->Content);
	}

	public static function SubsitesListing() {
		$subsites = DataObject::get("Subsite", "Language <> 'en_US'");
		foreach ($subsites as $subsite) {
			$lang = i18n::get_lang_from_locale($subsite->Language);
			$subsite->Lang = $lang;
			$subsite->LangEnglish = i18n::get_language_name($lang);
			$subsite->LangNative  = i18n::get_language_name($lang, true);
			$subsite->LocaleName  = i18n::get_locale_name($subsite->Language);
		}
		$subsites->sort("Lang");
		return $subsites;
	}
}

?>
