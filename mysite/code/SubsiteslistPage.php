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
		$currentsubsiteID = Subsite::currentSubsiteID();
		/* some hacking for absoluteBaseURL function whenwildcards are used (would use current host as basis, i.e. would result in nl.de.domain.org */
		$orighost = $_SERVER['HTTP_HOST'];
		if ($currentsubsiteID != Subsite::getSubsiteIDForDomain("nonexistant.entry.get.defaultplease", true) ) {
			$domain = explode('.',Subsite::currentSubsite()->Domain());
			$_SERVER['HTTP_HOST'] = substr($orighost, strlen($domain[0])+1);
		}
		foreach ($subsites as $subsite) {
			Subsite::changeSubsite($subsite);
			$subsite->Domainlink=$subsite->absoluteBaseURL();
			$domain       = explode('.',Convert::raw2sql($subsite->Domain()));
			$homepage     = Translatable::get_one_by_locale('SiteTree', $subsite->Language , "HomepageForDomain LIKE '%".$domain[0].".%'");
			$homepageurl  = $homepage ? $homepage->URLSegment : "home";
                        $sitehomepage = SiteTree::get_by_link($homepageurl);
			if ( $sitehomepage ) {
				$subsite->Notonline = false;
			} else {
				$subsite->Notonline = true;
			}
			$subsite->Homepagetitle = $sitehomepage->Title;
			$lang = i18n::get_lang_from_locale($subsite->Language);
			// returns pt_br - but listed as pt-BR in i18n function - use manual replacement instead of regex/str-replace foo
			$lang = ($lang == "pt_br") ? "pt-BR" : (( $lang == "zh_tw") ? "zh-TW" : (( $lang == "zh_cn") ? "zh-CN" : $lang));
			$subsite->Lang = $lang;
			$subsite->LangEnglish = i18n::get_language_name($lang);
			$subsite->LangNative  = ucfirst(i18n::get_language_name($lang, true));
		}
		$subsites->sort("Lang");
		Subsite::changeSubsite($currentsubsiteID);
		$_SERVER['HTTP_HOST'] = $orighost;
		return $subsites;
	}
}

?>
