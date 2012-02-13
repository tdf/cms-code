<?php
/**
 * A Donate page, replaces the string $PayPalTDF with the
 * corresponding paypal form
 */
class DonatePage extends Page {
}

class DonatePage_Controller extends Page_Controller {
function init() {
	parent::init();
}
function Content() {
   return str_replace(array('$PayPalOOoDev', '$PayPalTDF'), array($this->PayPalOOoDev(),$this->PayPalTDF()), $this->Content);
}
private function landinglang() {
	$landinglang='EN';
	switch($this->Locale) {
		case "de_DE": $landinglang = "DE"; break;
		case "fr_FR": $landinglang = "FR"; break;
		case "it_IT": $landinglang = "IT"; break;
		case "es_ES": $landinglang = "ES"; break;
		case "ja_JP": $landinglang = "JP"; break;
	}
	return $landinglang;
}
function PayPalOOoDev() {
	return self::PayPalTDF();
}

function PayPalTDF() {
return '<p>PayPal: donations@documentfoundation.org</p>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<p>
	<input name="lc" value="'.$this->landinglang().'" type="hidden">
	<input name="cmd" value="_donations" type="hidden">
	<input name="business" value="donations@documentfoundation.org" type="hidden">
	<input name="return" value="http://www.documentfoundation.org" type="hidden">
	<input name="undefined_quantity" value="0" type="hidden">
	<input name="item_name" value="The Document Foundation" type="hidden">
	'._t('Donationpage.AMOUNT', 'Amount:').' <input name="amount" size="4" maxlength="10" value="10" style="text-align: right;" type="text">
		<select name="currency_code">
			<option value="EUR">EUR</option>
			<option value="USD">USD</option>
			<option value="GBP">GBP</option>
			<option value="CHF">CHF</option>
			<option value="AUD">AUD</option>
			<option value="HKD">HKD</option>
			<option value="CAD">CAD</option>
			<option value="JPY">JPY</option>
			<option value="NZD">NZD</option>
			<option value="SGD">SGD</option>
			<option value="SEK">SEK</option>
			<option value="DKK">DKK</option>
			<option value="PLN">PLN</option>
			<option value="NOK">NOK</option>
			<option value="HUF">HUF</option>
			<option value="CZK">CZK</option>
			<option value="ILS">ILS</option>
			<option value="MXN">MXN</option>
	</select>
	<input name="charset" value="utf-8" type="hidden">
	<input name="no_shipping" value="1" type="hidden">
	<input name="image_url" value="https://www.libreoffice.org/themes/libo/images/logo.png" type="hidden">
	<input name="cancel_return" value="http://www.documentfoundation.org" type="hidden">
	<input name="no_note" value="1" type="hidden"><br><br>
	<input src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" name="submit" alt="PayPal secure payments." type="image">
	</p>
	</form>';
}
}
?>
