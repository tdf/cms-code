<?php
/**
 * Field for entering time that provides clock for selecting time.
 * @package forms
 * @subpackage fields-datetime
 */
class DropdownTimeField extends LegacyTimeField {
	
	static function Requirements() {
		Requirements::javascript('legacydatetimefields/javascript/DropdownTimeField.js' );
		Requirements::css('legacydatetimefields/css/DropdownTimeField.css' );
	}
	
	static function HTMLField( $id, $name, $val ) {
		return <<<HTML
			<input type="text" id="$id" name="$name" value="$val"/>
			<img class="timeIcon" src="sapphire/images/clock-icon.gif" id="$id-icon"/>
			<div class="dropdownpopup" id="$id-dropdowntime"></div>
HTML;
	}
	
	function Field() {
		
		self::Requirements();
		
		$field = parent::Field();

		$id = $this->id();
		$val = $this->attrValue();
		
		$innerHTML = self::HTMLField( $id, $this->name, $val );
			
		return <<<HTML
			<div class="dropdowntime">
				$innerHTML
			</div>
HTML;
	}
}