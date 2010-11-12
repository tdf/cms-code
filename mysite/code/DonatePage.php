<?php
/**
 * A Donate page, replaces the string $PayPalOOoDev with the
 * corresponding paypal form
 */
class DonatePage extends Page {
}
 
class DonatePage_Controller extends Page_Controller {
function init() {
	parent::init();
}
function Content() { 
   return str_replace('$PayPalOOoDev', $this->PayPalOOoDev(), $this->Content); 
}
function PayPalOOoDev() {
return '<p>PayPal: paypal@ooodev.org</p> 
	<form action="https://www.paypal.com/de/cgi-bin/webscr" method="post"> 
	<p> 
	<input name="cmd" value="_donations" type="hidden"> 
	<input name="business" value="paypal@ooodev.org" type="hidden"> 
	<input name="return" value="http://www.documentfoundation.org" type="hidden"> 
	<input name="undefined_quantity" value="0" type="hidden"> 
	<input name="item_name" value="Document Foundation" type="hidden"> 
	Amount: <input name="amount" size="4" maxlength="10" value="" style="text-align: right;" type="text"> 
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
	<input name="image_url" value="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" type="hidden"> 
	<input name="cancel_return" value="http://www.documentfoundation.org" type="hidden"> 
	<input name="no_note" value="0" type="hidden"><br><br> 
	<input src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" name="submit" alt="PayPal secure payments." type="image"> 
	</p> 
	</form>';

}
 
}
 
?>
