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
    $(function() {
        /*$(".second_div").hide();
		$(".btn1").click(function () {
			$(".second_div").show().toggle(500);
			$(".first_div").hide().toggle(500)
		});
	    $(".btn2").click(function () {
			$(".first_div").show().toggle(500);
			$(".second_div").hide().toggle(500)
        });*/
		//можно и так, но так нехорошо, если у вас вдруг будет 4 кнопки, код увеличиться в 2 раза, согласитесь, не оч
		$('.tab-content:not(.active)').hide(); //скрываем неактивный контент
		$('.tab-btn').click(function(e){
			e.preventDefault();
			$this = $(this); //получаем кнопку
			if(!$this.hasClass('active')){
				$container = $this.parent();
				$container.find('.tab-content').removeClass('active'); //это если скрывать через добавление класса
				$container.find('.tab-content').hide().toggle(500); //то же, только так как у вас
				$container.find($this.attr('href')).show().toggle(500);
				$container.find('.tab-btn').removeClass('active');
				$this.addClass('active');
			}
		});
  });
  
})(jQuery);
});




