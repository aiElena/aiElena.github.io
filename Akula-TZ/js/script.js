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
			$(this).closest('.menu').toggleClass('menu_state_open');
		}
		});
    });
  });
  
})(jQuery);
});

     $(document).ready(function () {
       $(".second_div").hide();
            $(".btn1").click(function () {
                $(".second_div").show().toggle(500);
                $(".first_div").hide().toggle(500)
            });
          $(".btn2").click(function () {
                $(".first_div").show().toggle(500);
                $(".second_div").hide().toggle(500)
        });
     });


