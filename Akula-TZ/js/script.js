$(window).on('load',function (){

    $('#preloader').fadeOut(3000);
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
			$(this).closest('.menu').toggleClass('menu_state_open');
		}
		});
    });
  });
})(jQuery);
});




