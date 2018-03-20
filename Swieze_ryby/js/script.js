$(document).ready(function() {
  $('#media').carousel({
    pause: true,
    interval: false,
  });
});	





$(function(){
	$('.carousel-inner').slick({arrows:false});
    $('#next').click(function(){
    	$('.right carousel-control').slick('slickNext');
    });
    $('#prev').click(function(){
    	$('.left carousel-control').slick('slickPrev');
    });
});



		