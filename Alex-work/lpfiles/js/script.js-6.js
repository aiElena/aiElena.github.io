	$(function() {

		$('.to-form').on('click', function(e){
			e.preventDefault();
			var posTop = $("#block9").offset().top;
			$('html, body').animate({scrollTop: posTop}, 1500);
		})
	});
    $(document).ready(function () {
        
        $('body').append('<div class="ac_footer"><span>&copy; 2018 Copyright. All rights reserved.</span><br><a href="lpfiles/policy_en.html" target="_blank">Privacy policy</a> | <a href="http://ac-feedback.com/report_form/">Report</a></div>');

        
        try {
            moment.locale("");
            $('.day-before').text(moment().subtract(1, 'day').format('D.MM.YYYY'));
            $('.day-after').text(moment().add(1, 'day').format('D.MM.YYYY'));
        } catch (e) { console.log('moment problems!'); }
    });



