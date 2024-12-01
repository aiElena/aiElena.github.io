jQuery(document).ready(function($) {
	jQuery('.ewd-ulb-main-dashboard-review-ask').css('display', 'block');

	jQuery('.ewd-ulb-main-dashboard-review-ask').on('click', function(event) {
		if (jQuery(event.srcElement).hasClass('notice-dismiss')) {
			var data = 'Ask_Review_Date=3&action=ewd_ulb_hide_review_ask';
        	jQuery.post(ajaxurl, data, function() {});
        }
	});

	jQuery('.ewd-ulb-review-ask-yes').on('click', function() {
		jQuery('.ewd-ulb-review-ask-feedback-text').removeClass('ulb-hidden');
		jQuery('.ewd-ulb-review-ask-starting-text').addClass('ulb-hidden');

		jQuery('.ewd-ulb-review-ask-no-thanks').removeClass('ulb-hidden');
		jQuery('.ewd-ulb-review-ask-review').removeClass('ulb-hidden');

		jQuery('.ewd-ulb-review-ask-not-really').addClass('ulb-hidden');
		jQuery('.ewd-ulb-review-ask-yes').addClass('ulb-hidden');

		var data = 'Ask_Review_Date=7&action=ewd_ulb_hide_review_ask';
    	jQuery.post(ajaxurl, data, function() {});
	});

	jQuery('.ewd-ulb-review-ask-not-really').on('click', function() {
		jQuery('.ewd-ulb-review-ask-review-text').removeClass('ulb-hidden');
		jQuery('.ewd-ulb-review-ask-starting-text').addClass('ulb-hidden');

		jQuery('.ewd-ulb-review-ask-feedback-form').removeClass('ulb-hidden');
		jQuery('.ewd-ulb-review-ask-actions').addClass('ulb-hidden');

		var data = 'Ask_Review_Date=1000&action=ewd_ulb_hide_review_ask';
    	jQuery.post(ajaxurl, data, function() {});
	});

	jQuery('.ewd-ulb-review-ask-no-thanks').on('click', function() {
		var data = 'Ask_Review_Date=1000&action=ewd_ulb_hide_review_ask';
        jQuery.post(ajaxurl, data, function() {});

        jQuery('.ewd-ulb-main-dashboard-review-ask').css('display', 'none');
	});

	jQuery('.ewd-ulb-review-ask-review').on('click', function() {
		jQuery('.ewd-ulb-review-ask-feedback-text').addClass('ulb-hidden');
		jQuery('.ewd-ulb-review-ask-thank-you-text').removeClass('ulb-hidden');

		var data = 'Ask_Review_Date=1000&action=ewd_ulb_hide_review_ask';
        jQuery.post(ajaxurl, data, function() {});
	});

	jQuery('.ewd-ulb-review-ask-send-feedback').on('click', function() {
		var Feedback = jQuery('.ewd-ulb-review-ask-feedback-explanation textarea').val();
		var EmailAddress = jQuery('.ewd-ulb-review-ask-feedback-explanation input[name="feedback_email_address"]').val();
		var data = 'Feedback=' + Feedback + '&EmailAddress=' + EmailAddress + '&action=ewd_ulb_send_feedback';
        jQuery.post(ajaxurl, data, function() {});

        var data = 'Ask_Review_Date=1000&action=ewd_ulb_hide_review_ask';
        jQuery.post(ajaxurl, data, function() {});

        jQuery('.ewd-ulb-review-ask-feedback-form').addClass('ulb-hidden');
        jQuery('.ewd-ulb-review-ask-review-text').addClass('ulb-hidden');
        jQuery('.ewd-ulb-review-ask-thank-you-text').removeClass('ulb-hidden');
	});
});