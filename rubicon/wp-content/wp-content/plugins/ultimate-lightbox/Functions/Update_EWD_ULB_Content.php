<?php

function Update_EWD_ULB_Content() {
	global $ewd_ulb_message;
	if (isset($_GET['Action'])) {
		switch ($_GET['Action']) {
			case "EWD_ULB_UpdateOptions":
       			$ewd_ulb_message = EWD_ULB_UpdateOptions();
				break;
			default:
				$ewd_ulb_message = __("The form has not worked correctly. Please contact the plugin developer.", 'ultimate-lightbox');
				break;
		}
	}
}

?>