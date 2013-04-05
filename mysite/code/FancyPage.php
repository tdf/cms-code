<?php
class FancyPage extends Page {
}
class FancyPage_Controller extends Page_Controller {
	public function init() {
		parent::init();
		Requirements::block('themes/libo/css/layout.css');
		Requirements::block('themes/libo/css/form.css');
		Requirements::block('themes/libo/css/typography.css');
	}

	function Discover() {
		return $this->renderWith("Discover");
	}
}
