$(window).on('load',function (){

    $('#preloader').fadeOut(600);
});

jQuery(document).ready(function() {
	jQuery("a.scrollto").click(function () {
		elementClick = jQuery(this).attr("href")
		destination = jQuery(elementClick).offset().top;
		jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 1100);
		return false;
	});
  
	(function($){
		$(function() {
			$('.menuToggle').on('click', function() {
				$('.top-menu').slideToggle(300, function(){
				if($(this).css('display') === 'none'){
					$(this).removeAttr('style');
				}
				});
			});
		});


		$('.tab-content:not(.active)').hide(); //скрываем неактивный контент
		$('.tab-btn').click(function(e){
			e.preventDefault();
			if(!$(this).hasClass('active')){
				$container = $(this).parent();
				$container.find('.tab-content').removeClass('active'); 
				$container.find('.tab-content').slideUp(500); 
				$container.find($(this).attr('href')).slideDown(500);
				$container.find('.tab-btn').removeClass('active');
				$(this).addClass('active');
			}
		});

	})(jQuery);
	
	$('.menuToggle').click(function(){
		$(this).toggleClass('open');
	});
});
