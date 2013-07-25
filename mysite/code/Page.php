<?php
class Page extends SiteTree {

	public static $db = array(
		"IsFullWidth" => "Boolean",
		'ShufflerWidth' => 'Int',
		'ShufflerHeight' => 'Int',
		'PauseSeconds' => 'Decimal',
		'FadeSeconds' => 'Decimal',
		'UseColorbox' => 'Boolean'
	);
	static $defaults = array(
		'ShufflerWidth' => 400,
		'ShufflerHeight' => 300,
		'PauseSeconds' => 5.0,
		'FadeSeconds' => 0.70
	);
	static $has_many = array (
		'Images' => 'ImageResource'
	);

	function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Content.Main', new CheckboxField('IsFullWidth'), 'Content');
		$fields->addFieldToTab('Root.Content.Colorbox', new CheckboxField('UseColorbox'));

		$width = new NumericField('ShufflerWidth', "Scale images to width x height (keeps aspect ratio)");
		$height = new NumericField('ShufflerHeight', " x ");
		$width->setMaxLength(4);
		$height->setMaxLength(4);
		$fields->addFieldToTab("Root.Content.PhotoShuffler",new FieldGroup($width,$height));

		$pause = new NumericField('PauseSeconds', "Pause between changing images (seconds)");
		$fade = new NumericField('FadeSeconds', " Duration of the fade (seconds) ");
		$pause->setMaxLength(4);
		$fade->setMaxLength(4);
		$fields->addFieldToTab("Root.Content.PhotoShuffler",new FieldGroup($pause,$fade));

		$manager = new ImageDataObjectManager(
			$this, // Controller
			'Images', // Source name
			'ImageResource', // Source class
			'Attachment', // File name on DataObject
			array(
				'Title' => 'Title',
				'Caption' => 'Caption'
			), // Headings
			'getCMSFields_forPopup' // Detail fields
			// Filter clause
			// Sort clause
			// Join clause
		);
		$fields->addFieldToTab("Root.Content.PhotoShuffler",$manager);

		return $fields;
	}

	/**
	 * Return a list of all the pages to cache (StaticPublisher)
	 */
	function allPagesToCache() {
		$urls = array();

		// getting all pages from all subsites might be memory intensive
		// depending on number of pages (note from docs)
		Translatable::disable_locale_filter();
		// Forms/Forum pages are dynamic,thus don't cache them
		$pages = Subsite::get_from_all_subsites("Page", "ClassName<>'UserDefinedForm' AND ClassName<>'Forum' AND ClassName<>'ForumHolder' AND ( CanViewType='Anyone' OR CanViewType='Inherit')");
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
		if ($this->UseColorbox) {
			Requirements::themedCSS('colorbox');
			Requirements::javascript(THIRDPARTY_DIR.'/jquery/jquery-packed.js');
			Requirements::javascript('mysite/javascript/jquery.colorbox-min.js');
			Requirements::customScript(<<<JS
;(function($) {
  $(document).ready(function() {
    $("a[rel='colorbox']").colorbox({
      slideshow:true, slideshowAuto: false,
      maxWidth:"100%", maxHeight:"100%",
      transition: "fade"
    });
    $('img[src*="/_resampled/"]').each(function() {
      $(this).colorbox({
        href: function(){return $(this).attr('src').replace(/_resampled\/[^-]+-/, "");},
        maxWidth:"100%", maxHeight:"100%", initialWidth: "100", initialHeight: "100", transition: "elastic"
      });
    });
    $('div.colorbox,p.colorbox').each(function(index) {
      $(this).find('img[src*="/_resampled/"]').colorbox({rel: "colorbox"+index, transition: "fade"});
    });
  })
})(jQuery);
JS
			);
		}

		//enable tranlate-function _t ...
		if($this->dataRecord->hasExtension('Translatable')) {
			i18n::set_locale($this->dataRecord->Locale);
		}
		if($this->Images()->Count() && $this->ShufflerWidth != 0) {
			$replacement = "";
			foreach ($this->Images() as $imageobj) {
				$image = $imageobj->Attachment();
				if ($image->getDimensions("string") != $this->ShufflerWidth."x".$this->ShufflerHeight) {
					$resized = $image->SetSize($this->ShufflerWidth,$this->ShufflerHeight);
					$replacement.="'".$resized->Filename."',";
				} else {
					$replacement.="'".$image->Filename."',";
				}
			}
			Requirements::javascript("mysite/javascript/photoshuffler.js");
			Requirements::javascriptTemplate("mysite/javascript/photoshufflertemplate.js",
				array( "imagearray"      => "new Array(".substr($replacement,0,-1).")",
				"gblPauseSeconds" => $this->PauseSeconds,
				"gblFadeSeconds"  => $this->FadeSeconds));
		}
	}

	public function isRTL() {
		return in_array($this->Locale, i18n::$rtl_langs);
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

	public function Breadcrumbs($maxDepth = 20, $unlinked = false, $stopAtPageType = false, $showHidden = false) {
		// show breadcrumbs also for pages not shown in menu
		return parent::Breadcrumbs($maxDepth, $unlinked, $stopAtPageType, true);
	}

	public function getTranslations() {
		$translations = parent::getTranslations();
		if($translations) {
			foreach($translations as $dataobject) {
				$dataobject->NiceLang = $dataobject->obj(Locale)->Nice(True);
			}
			$translations->sort("NiceLang");
		}
		return $translations;
	}

	public function Banner() {
		return false;
		if ($this->SubsiteID == 13) {
			/* no donation banner for fi site */
			return false;
		} else {
			/* NOT VALID FOR THE 2013 CAMPAIGN: return amount *2.3 (approx.) i.e. when 50k -> return 115; */
			return 85;
		}
	}
	public function DonationURLSegment() {
		Subsite::disable_subsite_filter(true);
		/* get the page with ID 2219, i.e. the english one */
		$donateoriginal = DataObject::get_by_id('SiteTree', 2219);
		$translation = $donateoriginal->getTranslation($this->Locale);
		Subsite::disable_subsite_filter(false);
		if ($translation) {
			return $translation->URLSegment."/";
		}
		return false;
	}
}
