<?php
/* Add any update or error notices to the top of the admin page */
function EWD_ULB_Error_Notices(){
    global $ewd_ulb_message;
	if (isset($ewd_ulb_message)) {
		if (isset($ewd_ulb_message['Message_Type']) and $ewd_ulb_message['Message_Type'] == "Update") {echo "<div class='updated'><p>" . $ewd_ulb_message['Message'] . "</p></div>";}
		if (isset($ewd_ulb_message['Message_Type']) and $ewd_ulb_message['Message_Type'] == "Error") {echo "<div class='error'><p>" . $ewd_ulb_message['Message'] . "</p></div>";}
	}

	if( get_transient( 'ewd-ulb-admin-install-notice' ) ){ ?>
		<div class="updated notice is-dismissible">
            <p>Head over to the <a href="admin.php?page=EWD-ULB-options">Ultimate Lightbox</a> to get started using the plugin!</p>
        </div>

        <?php
        delete_transient( 'ewd-ulb-admin-install-notice' );
	}

	$Ask_Review_Date = get_option('EWD_ULB_Ask_Review_Date');
	if ($Ask_Review_Date == "") {$Ask_Review_Date = get_option("EWD_ULB_Install_Time") + 3600*24*4;}

	if ($Ask_Review_Date < time() and get_option("EWD_ULB_Install_Time") < time() - 3600*24*4) {

		global $pagenow;
		if($pagenow != 'post.php' && $pagenow != 'post-new.php'){ ?>

			<div class='notice notice-info is-dismissible ewd-ulb-main-dashboard-review-ask' style='display:none'>
				<div class='ewd-ulb-review-ask-plugin-icon'></div>
				<div class='ewd-ulb-review-ask-text'>
					<p class='ewd-ulb-review-ask-starting-text'>Enjoying using the Ultimate Lightbox plugin?</p>
					<p class='ewd-ulb-review-ask-feedback-text ulb-hidden'>Help us make the plugin better! Please take a minute to rate the plugin. Thanks!</p>
					<p class='ewd-ulb-review-ask-review-text ulb-hidden'>Please let us know what we could do to make the plugin better!<br /><span>(If you would like a response, please include your email address.)</span></p>
					<p class='ewd-ulb-review-ask-thank-you-text ulb-hidden'>Thank you for taking the time to help us!</p>
				</div>
				<div class='ewd-ulb-review-ask-actions'>
					<div class='ewd-ulb-review-ask-action ewd-ulb-review-ask-not-really ewd-ulb-review-ask-white'>Not Really</div>
					<div class='ewd-ulb-review-ask-action ewd-ulb-review-ask-yes ewd-ulb-review-ask-green'>Yes!</div>
					<div class='ewd-ulb-review-ask-action ewd-ulb-review-ask-no-thanks ewd-ulb-review-ask-white ulb-hidden'>No Thanks</div>
					<a href='https://wordpress.org/support/plugin/ultimate-lightbox/reviews/' target='_blank'>
						<div class='ewd-ulb-review-ask-action ewd-ulb-review-ask-review ewd-ulb-review-ask-green ulb-hidden'>OK, Sure</div>
					</a>
				</div>
				<div class='ewd-ulb-review-ask-feedback-form ulb-hidden'>
					<div class='ewd-ulb-review-ask-feedback-explanation'>
						<textarea></textarea>
						<br>
						<input type="email" name="feedback_email_address" placeholder="<?php _e('Email Address', 'ultimate-lightbox'); ?>">
					</div>
					<div class='ewd-ulb-review-ask-send-feedback ewd-ulb-review-ask-action ewd-ulb-review-ask-green'>Send Feedback</div>
				</div>
				<div class='ewd-ulb-clear'></div>
			</div>

			<?php
		}
	}

}

