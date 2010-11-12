<?php
/**
 * This field creates a date field that shows a calendar on pop-up
 * @package forms
 * @subpackage fields-datetime
 */
class CalendarDateField extends LegacyDateField {
	protected $futureOnly;
	protected $mustBeBefore = null;
	protected $mustBeAfter = null;
	
	static function HTMLField( $id, $name, $val ) {
		return <<<HTML
			<input type="text" id="$id" name="$name" value="$val" />
			<img src="sapphire/images/calendar-icon.gif" id="$id-icon" alt="Calendar icon" />
			<div class="calendarpopup" id="$id-calendar"></div>
HTML;
	}
	
	function Field() {
		Requirements::javascript(THIRDPARTY_DIR . '/prototype/prototype.js');
		Requirements::javascript(THIRDPARTY_DIR . '/behaviour/behaviour.js');
		Requirements::javascript(THIRDPARTY_DIR . "/calendar/calendar.js");
		Requirements::javascript(THIRDPARTY_DIR . "/calendar/lang/calendar-en.js");
		Requirements::javascript(THIRDPARTY_DIR . "/calendar/calendar-setup.js");
		Requirements::javascript("legacydatetimefields/javascript/CalendarDateField.js");
		Requirements::css("legacydatetimefields/css/CalendarDateField.css");
		Requirements::css(THIRDPARTY_DIR . "/calendar/calendar-win2k-1.css");

		$id = $this->id();
		$val = $this->attrValue();
		
		$futureClass = $this->futureOnly ? ' futureonly' : '';
				$attrs = ($this->mustBeAfter ? " after=\"{$this->mustBeAfter}\" " : '') . ($this->mustBeBefore ? " before=\"{$this->mustBeBefore}\"" : '');
		$innerHTML = self::HTMLField( $id, $this->name, $val, $attrs );
		
		return <<<HTML
			<div class="calendardate$futureClass">
				$innerHTML
			</div>
HTML;
	}
	
	function mustBeAfter($fieldName) {
		$this->mustBeAfter = $fieldName;
	}
	
	function mustBeBefore($fieldName) {
		$this->mustBeBefore = $fieldName;
	}
	
	/**
	 * Sets the field so that only future dates can be set on them
	 */
	function futureDateOnly() {
		$this->futureOnly = true;
	}
}

?>
