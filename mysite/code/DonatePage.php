<?php
/**
 * A Donate page, replaces the string $PayPalTDF with the
 * corresponding paypal form
 */
class DonatePage extends Page {
}

class DonatePage_Controller extends Page_Controller {
        private static $passphrase = 'yuJpYksbQbrHbx59';
        private static $passphrase_incoming = 'JOI7aUwp8rtVA4dG';

	public static $url_handlers = array(
			'POST external' => 'verifyPOST',
			'POST accept'   => 'acceptPOST'
		);
	static $allowed_actions = array(
			'verifyPOST',
			'acceptPOST',
			'thankyou',
			'oops',
			'thanksbut',
			'ConcardisTemplate',
			'cancel'
		);

	/* default parameters, also used to filter data to those keys */
			//catalogurl   => "http://www.documentfoundation.org",
			//email	     => "floeff@documentfoundation.org",
        static $defaultvars = array(
			'Amount'       => 13,  
			'action_paymenttype' => "dummy",  
			'accepturl'    => "http://donate.libreoffice.org/DonationProceed/thankyou",  
			'declineurl'   => "http://donate.libreoffice.org/DonationProceed/oops",
			'exceptionurl' => "http://donate.libreoffice.org/DonationProceed/thanksbut", 
			'cancelurl'    => "http://donate.libreoffice.org/DonationProceed/cancel", 
			'homeurl'      => "http://donate.libreoffice.org",
			'tp'           => "https://donate.libreoffice.org/DonationProceed/ConcardisTemplate",
			'type'         => "prod", 
			'currency'     => "EUR", 
			'com'          => "Donation to The Document Foundation",
			'complus'      => "en_US",
			'language'     => "en_US",
			'operation'    => "SAL", 
			'pmlisttype'   => "2", 
			'pspid'        => "40F02481", 
			'win3ds'       => "MAINW" 
                );

	function Content() {
		return str_replace(
			array('$PayPalOOoDev',      '$PayPalTDF',       '$DonateCombined'), 
			array($this->PayPalOOoDev(), $this->PayPalTDF(), $this->CombinedDonationForm()), $this->Content);
	}

	function ConcardisTemplate() {
		return $this->renderWith("CreditProcess");
	}
	private function landinglang() {
// https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/e_howto_html_Appx_websitestandard_htmlvariables#id08A6HI0709B
		$landinglang='US';
		switch($this->Locale) {
			case "de_DE": $landinglang = "DE"; break;
			case "fr_FR": $landinglang = "FR"; break;
			case "he_IL": $landinglang = "he_IL"; break;
			case "it_IT": $landinglang = "IT"; break;
			case "es_ES": $landinglang = "ES"; break;
			case "nl_NL": $landinglang = "NL"; break;
			case "ja_JP": $landinglang = "jp_JP"; break;
			case "pl_PL": $landinglang = "PL"; break;
			case "pt_BR": $landinglang = "BR"; break;
			case "ru_RU": $landinglang = "RU"; break;
			case "tr_TR": $landinglang = "tr_TR"; break;
			case "zh_CN": $landinglang = "zh_CN"; break;
			case "zh_TW": $landinglang = "zh_TW"; break;
		}
		return $landinglang;
	}

	/* the donation form - it would also be possible to do it with a self-written template, but doing it
	 * within silverstipe will automatically add validation to field-inputs as well as automatically add
	 * the CSRF-protection (but as there is not much to verify...)
	 */
	function DonationProceed() {
		$currency = new DropdownField($name="currency", $title='', $source = array(
				"AED" => "AED",
				"ANG" => "ANG",
				"ARS" => "ARS",
				"AUD" => "AUD (*)",
				"AWG" => "AWG",
				"AZN" => "AZN",
				"BGN" => "BGN",
				"BOB" => "BOB",
				"BRL" => "BRL",
				"CAD" => "CAD (*)",
				"CHF" => "CHF (*)",
				"CLP" => "CLP",
				"CNY" => "CNY",
				"COP" => "COP",
				"CZK" => "CZK (*)",
				"DKK" => "DKK (*)",
				"EGP" => "EGP",
				"EUR" => "EUR (*)",
				"GBP" => "GBP (*)",
				"HKD" => "HKD (*)",
				"HRK" => "HRK",
				"HUF" => "HUF (*)",
				"IDR" => "IDR",
				"ILS" => "ILS (*)",
				"INR" => "INR",
				"ISK" => "ISK",
				"JPY" => "JPY (*)",
				"KES" => "KES",
				"KRW" => "KRW",
				"KZT" => "KZT",
				"LTL" => "LTL",
				"LVL" => "LVL",
				"MAD" => "MAD",
				"MDL" => "MDL",
				"MKD" => "MKD",
				"MXN" => "MXN (*)",
				"MYR" => "MYR",
				"NOK" => "NOK (*)",
				"NZD" => "NZD (*)",
				"PEN" => "PEN",
				"PHP" => "PHP (*)",
				"PLN" => "PLN (*)",
				"PYG" => "PYG",
				"QAR" => "QAR",
				"RON" => "RON",
				"RSD" => "RSD",
				"RUB" => "RUB",
				"SAR" => "SAR",
				"SEK" => "SEK (*)",
				"SGD" => "SGD (*)",
				"SRD" => "SRD",
				"SYP" => "SYP",
				"THB" => "THB (*)",
				"TRY" => "TRY",
				"TWD" => "TWD (*)",
				"UAH" => "UAH",
				"USD" => "USD (*)",
				"UYU" => "UYU",
				"VEF" => "VEF",
				"VER" => "VER",
				"ZAR" => "ZAR"
			), $value = _t("DonatePage.DEFAULT_CURRENCY", "USD"));
		/* can be used to set custom back to site, cancel, etc URLs, and of course to determine the language */
		$subsite  = new HiddenField($name="subsite");
		$fromurl  = new HiddenField($name="homeurl");
		$language = new HiddenField($name="language");
		$complus = new HiddenField($name="complus");
		$subsite->setValue($this->SubsiteID);
		$fromurl->setValue($this->AbsoluteLink());
		$language->setValue($this->Locale);
		$complus->setValue($this->Locale);
		$predefined = new OptionsetField( 
				$name = 'Amount', 
				$title = '', 
				$source = array("05" => _t("DonatePage.DEFAULT_AMOUNT_EUR05",  "5")." "._t("DonatePage.DEFAULT_CURRENCY"),
						"10" => _t("DonatePage.DEFAULT_AMOUNT_EUR10", "10")." "._t("DonatePage.DEFAULT_CURRENCY"),
						"20" => _t("DonatePage.DEFAULT_AMOUNT_EUR20", "20")." "._t("DonatePage.DEFAULT_CURRENCY"),
						"50" => _t("DonatePage.DEFAULT_AMOUNT_EUR50", "50")." "._t("DonatePage.DEFAULT_CURRENCY")),
				$value = "10" 
				); 
		$defaultChoices = _t("DonatePage.CHOICE_DEFAULT", "Select one of the default values");
		$customAmount = _t("DonatePage.CUSTOM_CHOICE", "Or enter a custom amount and currency<br/>(only those marked with * are also available via PayPal)");
		$groups = new SelectionGroup("toggle_custom",array("predefined//".$defaultChoices => $predefined,
				"custom//".$customAmount => new NumericField($name="customValue", $title="",
				$value = _t("DonatePage.CUSTOM_AMOUNT_VALUE", "25"), $maxLength=10)));
		$groups->setValue("predefined");
		$fields = new FieldSet($groups, $currency, $subsite, $fromurl, $language, $complus );
		$actions = new FieldSet(
			new FormAction("concardis", _t("DonatePage.BUTTON_CARD",   "Donate via Credit Card")),
			new FormAction("paypal",    _t("DonatePage.BUTTON_PAYPAL", "Donate via PayPal")));
		$proceedform = new Form($this, "DonationProceed", $fields, $actions, $requiredFields = new RequiredFields(array("Amount","NumericField")));
		//$proceedform->setFormAction("//donate.libreoffice.org/DonationProceed/external?debug_request=1");
		$proceedform->setFormAction("//donate.libreoffice.org/DonationProceed/external");

		return $proceedform;
	}

	/* create the form that auto-submits to the payment operator */
	private function proceedPaypal($data, $form) {
		$this->Locale = $data['language'];
		return $this->renderWith(array("DonateProceed", "Page"),
				array('MetaTitle' => "Donate", 'type' => "paypal", 'paypallang' => $this->landinglang(), 'data' => $data));
	}
	private function proceedConcardis($data, $form) {
		$data["centamount"]=$data['Amount']*100;
		return $this->renderWith(array("DonateProceed", "Page"),
				array('MetaTitle' => "Donate", 'type' => "concardis", 'data' => self::form_sign($data)));
	}
	/* post-data to Concardis needs to be hashed as a security measure
	 * keys that are only set to a value must not be included
         * make sure it is alphabetically sorted
	 */
        private static function form_sign($input_array) {
                /* TODO: conditionalize email, etc */
                $input_array['orderid'] = uniqid("LIBODONATE-");
                $output_array = array_merge(self::$defaultvars, $input_array);
                        //"CATALOGURL=".  $output_array['catalogurl']  .self::$passphrase.
                        //"EMAIL=".       $output_array['email']       .self::$passphrase.
                $output_array['sign'] = strtoupper(hash('sha512',
                        "ACCEPTURL=".   $output_array['accepturl']   .self::$passphrase.
                        "AMOUNT=".      $output_array['centamount']  .self::$passphrase.
                        "CANCELURL=".   $output_array['cancelurl']   .self::$passphrase.
                        "COM=".         $output_array['com']         .self::$passphrase.
                        "COMPLUS=".     $output_array['language']    .self::$passphrase.
                        "CURRENCY=".    $output_array['currency']    .self::$passphrase.
                        "DECLINEURL=".  $output_array['declineurl']  .self::$passphrase.
                        "EXCEPTIONURL=".$output_array['exceptionurl'].self::$passphrase.
                        "HOMEURL=".     $output_array['homeurl']     .self::$passphrase.
                        "LANGUAGE=".    $output_array['language']    .self::$passphrase.
                        "OPERATION=".   $output_array['operation']   .self::$passphrase.
                        "ORDERID=".     $output_array['orderid']     .self::$passphrase.
                        "PMLISTTYPE=".  $output_array['pmlisttype']  .self::$passphrase.
                        "PSPID=".       $output_array['pspid']       .self::$passphrase.
                        "TP=".          $output_array['tp']          .self::$passphrase.
                        "WIN3DS=".      $output_array['win3ds']      .self::$passphrase,
                        FALSE));

                return $output_array;
        }

	/* helper function to sanity-check the submission before it is handed over to the payment-provider */
	function verifyPOST($request) {
		//Debug::dump($request->postVars());	
		if(!SecurityToken::inst()->checkRequest($request)) {
			return $this->httpError(400);
		}
		if ($request->postVar('action_paypal') xor $request->postVar('action_concardis')) { 
			/* filter out not-essential stuff */ 
			$post_data = array_intersect_key($request->postVars(), self::$defaultvars); 
			if ($request->postVar('toggle_custom') == "custom") { 
				/* TODO: Do some more validation */ 
				$post_data['Amount'] = str_replace(',', '.', $request->postVar('customValue')); 
			} else {
				i18n::set_locale($post_data['language']);
				$post_data['Amount'] = _t("DonatePage.DEFAULT_AMOUNT_EUR".$post_data['Amount']); 
			}
			//Debug::dump($post_data);      
Requirements::customScript(<<<JS
jQuery(document).ready(function() {
jQuery("#autosubmit").submit();
 });
JS
);
                } else { 
                        return $this->httpError(400); 
                } 
                if ($request->postVar('action_concardis')) { 
                        return self::proceedConcardis($post_data,null); 
                } else { 
                        return self::proceedPaypal($post_data,null); 
                }

	}
	
	/* transaction feedback von Concardis sent asynchronously (after payment, either successful or not) 
	 * validation is done by computing a hash of passed parameters using the secret SHA-OUT, just like
	 * when sending the data to ConCardis */
	function acceptPOST($request) {
		$post_vars = array_change_key_case($request->postVars(), CASE_UPPER);
		ksort($post_vars);
		if ($post_vars['STATUS'] == 9 && $post_vars['SHASIGN']) {
			$sha_given = $post_vars['SHASIGN'];
			unset($post_vars['SHASIGN']);
			$computed_hash = strtoupper(hash('sha512',
						http_build_query($post_vars, '', self::$passphrase_incoming).self::$passphrase_incoming));
			if ($sha_given === $computed_hash) {
				/* valid post from concardis, and status=9, thus payment successful, add it */
				$donationamount = new Money();
				$donationamount->setCurrency($post_vars['CURRENCY']);
				$donationamount->setAmount($post_vars['AMOUNT']);
				$donation = new Donation();
				$donation->Amount  = $donationamount;
				$donation->OrderID = $post_vars['ORDERID'];
				$donation->Locale  = $post_vars['COMPLUS'];
				$donation->write();
			} else {
				SS_Log::log(new Exception("hash $computed_hash did not match $sha_given: ".print_r($post_vars, true)), SS_Log::NOTICE);
			}
		}
		return new SS_HTTPResponse();
	}

	/* utility helper to just get the form without javascript, without css */
	function CombinedDonationForm() {
		return $this->DonationProceed()->forTemplate();
	}

	function PayPalOOoDev() {
		return self::PayPalTDF();
	}

function PayPalTDF() {
return '<p>PayPal: treasurer@documentfoundation.org</p>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<p>
	<input name="lc" value="'.$this->landinglang().'" type="hidden">
	<input name="cmd" value="_donations" type="hidden">
	<input name="business" value="treasurer@documentfoundation.org" type="hidden">
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
