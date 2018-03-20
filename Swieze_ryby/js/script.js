$(document).ready(function() {
  $('#media').carousel({
    pause: true,
    interval: false,
  });
});	





$(function(){
	$('.your-class').slick({arrows:false});
    $('#next').click(function(){
    	$('.your-class').slick('slickNext');
    });
    $('#prev').click(function(){
    	$('.your-class').slick('slickPrev');
    });
});
