<?php
class ModerationHelper extends Page_Controller {
	static $resultstring;

	function index($url) {
		return $this->renderWith("ModerationHelper");
	}
	function ModerateTranslateForm() {
		// Create fields
		$fields = new FieldSet(
				new TextareaField('Message', "Paste the bottom of the moderation request message, including the charset here", 20, 100)
				);
		// Create actions
		$actions = new FieldSet(
				new FormAction('decodeMessage', 'Decode the Message'),
				new FormAction('clearSession', 'Clear the session (remove result)')
				);
		return new Form($this, 'ModerateTranslateForm', $fields, $actions);
	}
	function clearSession() {
		Session::clear("ModResult");
		Director::redirectBack();
	}

	function gmail() {
		$markup=<<<'EOF'
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<a href="javascript:void(0)" onclick="jQuery('#formresponse').html(''); jQuery('#Form_ModerateTranslateForm_Message').val(''); return false; ">clear</a>
<a href="javascript:void(0)" onclick="jQuery('#formresponse').load('http://www.libreoffice.org/mod/ModerateResult', {message: jQuery('#Form_ModerateTranslateForm_Message').val()}); return false; ">decode</a>
<div class="goog-trans-section"><div class="goog-trans-control"></div>
<div id="formresponse"></div></div>
<textarea id="Form_ModerateTranslateForm_Message" name="Message" rows="7" cols="20"></textarea>
<script>
function googleSectionalElementInit() {
  new google.translate.SectionalElement({
    sectionalNodeClassName: 'goog-trans-section',
    controlNodeClassName: 'goog-trans-control',
    background: '#f4fa58'
  }, 'google_sectional_element');
}
</script>
<script src="//translate.google.com/translate_a/element.js?cb=googleSectionalElementInit&ug=section&hl=auto"></script>
EOF;
		return $markup;
	}

	function gmailwidget() {
		return $this->renderWith("GoogleGadget");
	}
	function ModerateResult() {
		if ($_POST['message']) {
			return "<p>".self::parseMessage($_POST['message'])."</p>";
		} else {
			return "nah, not gonna work this way";
		}
	}

	private static function parseMessage($querystring) {
		$basestringorig = $querystring;
		$charset = preg_filter("/.*^\s*Content-Type:[^\n]*charset=[\"']?([-0-9A-Za-z_]+)[^'\"]?.*/sm", "$1", $basestringorig);
		$base64 = preg_filter("/.*^\s*Content-Transfer-Encoding:\s*(base64)/sm", "$1", $basestringorig);
		$body = preg_split("/(^\s*$\n)+/m", $basestringorig);
		if ($base64 && (count($body) == 2)) {
			$decoded = base64_decode($body[1], true);
			if ($decoded) {
				$basestringorig = $decoded;
			}
		}

		if ($charset) {
			if (strtolower($charset) == "iso-2022-jp") {
				Session::set("ModResult", "<p>Sorry, $charset is usually used as 7bit encoding. As such, the resulting control sequences screw up display and prevent reliable copy and paste. Please use your browser's charset feature to vie the string. This page is meant to be used for base64 encoded strings only</p>");
				Director::redirectBack();
				return;
			}
			self::$resultstring .= "<p>Charset: $charset</p>";

			$decoded = iconv($charset, "UTF8", $basestringorig);
			if($decoded) {
				$basestringorig = $decoded;
			}

		} else {
			self::$resultstring .= "<p>Warning, couldn't detect charset</p>";
		}
		self::$resultstring .= "<p>Original string, decoded if possible:<br/>".preg_replace("/\n/","<br/>",$basestringorig)."</p>";
		return Convert::raw2xml($basestringorig);
	}
	function decodeMessage($data, $form) {
		Session::set("ModResult", self::parseMessage($data["Message"]));
		Director::redirectBack();
	}
	function Result() {
		$result = Session::get("ModResult");
		if($result) { return $result; } else { return false ;}
	}
}
