<?php
class ConcardisPayment extends Page_Controller {
	private static $passphrase = 'AVjth4eK7gQc6EzN';

	static $defaultvars = array(
		accepturl	=> "http://pumbaa.documentfoundation.org/accept.html", 
		declineurl	=> "http://pumbaa.documentfoundation.org/decline.html", 
		exceptionurl	=> "http://pumbaa.documentfoundation.org/exception.html", 
		cancelurl	=> "http://pumbaa.documentfoundation.org/cancel.html", 
		catalogurl	=> "http://www.documentfoundation.org", 
		tp		=> "http://pumbaa.documentfoundation.org/processing.html", 
		type		=> "test", 
		currency	=> "EUR", 
		com		=> "Donation to The Document Foundation", 
		homeurl		=> "http://www.documentfoundation.org", 
		operation	=> "SAL", 
		pmlisttype	=> "2", 
		pspid		=> "40F02481", 
		win3ds		=> "MAINW" 
		);


	function init() {
		parent::init();

	}
	function index($url) {
		return $this->renderWith("CreditProcess");
	}
	function process($url) {
		$formvariables = self::form_sign(self::$defaultvars);
		return $this->renderWith("CreditCard", $formvariables);
	}
	function accept($url) {
		return $this->renderWith("CreditCard");
	}
	private static function form_sign($input_array) {
		/* sign variables with SHA512 must be sorted alphabetically */
		/* TODO: conditionalize email, etc */
		$orderid = uniqid("LIBODONATE-");
		$input_array['orderid'] = $orderid;
		$output_array = array_merge($input_array, self::$defaultvars);
		$output_array['sign'] = strtoupper(hash('sha512',
			"ACCEPTURL=".	$defaultvars['accepturl']	.self::$passphrase.
			"AMOUNT=".	$input_array['amount']		.self::$passphrase.
			"CANCELURL=".	$defaultvars['cancelurl']	.self::$passphrase.
			"CATALOGURL=".	$defaultvars['catalogurl']	.self::$passphrase.
			"COM=".		$defaultvars['com']		.self::$passphrase.
			"CURRENCY=".	$defaultvars['currency']	.self::$passphrase.
			"DECLINEURL=".	$defaultvars['declineurl']	.self::$passphrase.
			"EMAIL=".	$input_array['email']		.self::$passphrase.
			"EXCEPTIONURL=".$defaultvars['exceptionurl']	.self::$passphrase.
			"HOMEURL=".	$defaultvars['homeurl']		.self::$passphrase.
			"LANGUAGE=".	$defaultvars['language']	.self::$passphrase.
			"OPERATION=".	$defaultvars['operation']	.self::$passphrase.
			"ORDERID=".	$orderid			.self::$passphrase.
			"PMLISTTYPE=".	$defaultvars['pmlisttype']	.self::$passphrase.
			"PSPID=".	$defaultvars['pspid']		.self::$passphrase.
			"TP=".		$defaultvars['tp']		.self::$passphrase.
			"WIN3DS=".	$defaultvars['win3ds']		.self::$passphrase,
			FALSE));
		
		return $output_array;
	}

}
