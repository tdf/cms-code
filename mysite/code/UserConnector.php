<?php
class UserConnector_Controller extends Controller implements PermissionProvider {
	/* pass Email and Password as either GET or POST (avoid get for password) */
	function AttachmentDelete($RAW_arguments) {
		# bilbo
		$canAccess = (($_SERVER['REMOTE_ADDR'] == '178.63.91.70') || Director::is_cli() );
		if(!$canAccess) return new SS_HTTPResponse("no body, this is ignored",204,"Shh, nothing to see here");

		$member = MemberAuthenticator::authenticate($RAW_arguments);
		if ($member) {
			if (Permission::checkMember($member, "MANAGE_ATTACHMENTS")) {
				return new SS_HTTPResponse("Yay - all OK, go ahead!\n", 200);
			} else {
				return new SS_HTTPResponse("Nice try, but you lack the privileges!\n", 403, "not in AttachmentManagers group");
			}
		} else {
			return new SS_HTTPResponse("Go away!\n", 403, "no such user or bad pw");
		}
	}

	function providePermissions() {
		return array("MANAGE_ATTACHMENTS" => "Manage Mailinglist Attachments");
	}
}
