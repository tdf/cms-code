<?php
/**
 * Field for entering a date/time pair.
 *
 * @todo Add localization support, see http://open.silverstripe.com/ticket/2931
 *
 * @package forms
 * @subpackage fields-datetime
 */
class PopupDateTimeField extends CalendarDateField {
	protected $defaultToEndOfDay = false;
	protected $allowOnlyTime = true;
	
	function defaultToEndOfDay($default = true) {
		$this->defaultToEndOfDay = $default;
	}
	
	function allowOnlyTime($default = true) {
		$this->allowOnlyTime = $default;
	}
	
	/**
	 * @todo js validation needs to be implemented.
	 */
	function jsValidation() {
	}

	/**
	 * @todo php validation needs to be implemented.
	 */
	function validate() {
		return true;
	}

	function Field() {
		Requirements::css('legacydatetimefields/css/PopupDateTimeField.css' );

		$field = parent::Field();

		DropdownTimeField::Requirements();

		$id = $this->id();

		$val = $this->attrValue();

		$date = $this->attrValueDate();
		$time = $this->attrValueTime();

		$futureClass = $this->futureOnly ? ' futureonly' : '';

		$innerHTMLDate = parent::HTMLField( $id . '_Date', $this->name . '[Date]', $date );
		$innerHTMLTime = DropdownTimeField::HTMLField( $id . '_Time', $this->name . '[Time]', $time );

		$attrs = ($this->mustBeAfter ? " after=\"{$this->mustBeAfter}\" " : '') . ($this->mustBeBefore ? " before=\"{$this->mustBeBefore}\"" : '');
		$defaultTime = $this->defaultToEndOfDay ? '11:59 pm' : '12:00 am';
		
		return <<<HTML
			<div$attrs id="$id" name="{$this->name}" class="popupdatetime">
				<ul>
					<li class="calendardate$futureClass">$innerHTMLDate</li>
					<li class="dropdowntime" defaultTime="$defaultTime">$innerHTMLTime</li>
				</ul>
			</div>
HTML;
	}

	function attrValueDate() {
		if( $this->value )
			return date( 'd/m/Y', strtotime( $this->value ) );
		else
			return '';
	}

	function attrValueTime() {
		if ($this->value) {
			// Try to detect if a time was specificied.
			$noTime = strlen($this->value) <12 && strpos($this->value, 'am') === false && strpos($this->value, 'pm') === false;
			if ($noTime && $this->defaultToEndOfDay) {
				return '11:59 pm';
			}
			return date( 'h:i a', strtotime( $this->value ) );
		} else {
			return '';
		}
	}

	function setValue( $val ) {
		if( is_array( $val ) ) {

			// 1) Date

			if( $val[ 'Date' ] && preg_match( '/^([\d]{1,2})\/([\d]{1,2})\/([\d]{2,4})/', $val[ 'Date' ], $parts ) )
				$date = "$parts[3]-$parts[2]-$parts[1]";
			else
				$date = null;

			// 2) Time

			$time = $val[ 'Time' ] ? date( 'H:i:s', strtotime( $val[ 'Time' ] ) ) : null;

			if( $date == null )
				$this->value = $this->allowOnlyTime ? $time : null;
			else if( $time == null )
				if ($this->defaultToEndOfDay) { $this->value = $date.' 23:59:59'; }
				else { $this->value = $date; }
			else
				$this->value = $date . ' ' . $time;
		}
		else
			$this->value = $val;
	}
	
	/**
	 * Get an SSDatetime object representing the converted
	 * time. Used to access the helper methods that SSDatetime
	 * provides
	 */
	function SSDatetime() {
		$datetime = new SS_Datetime($this->name);
		$datetime->setValue($this->value);
		return $datetime;
	}

	function dataValue() {
		return $this->value;
	}
}

?>