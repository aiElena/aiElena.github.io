$(document).ready(function() {

	//код функции слайдера

	$('.slider-active').owlCarousel({
		items: 4,
		navText : ["<img src='img/back.png'/>", "<img src='img/next.png'/>"],
		dots: false,
		autoplay: true,
		autoplayHoverPause: true,
		autoplaySpeed: 2000,
		navSpeed: 2000,
		loop:true,
    margin:5,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }

	});

	

})

var t;
function up() {
  var top = Math.max(document.body.scrollTop,document.documentElement.scrollTop);
  if(top > 0) {
    window.scrollBy(0,-100);
    t = setTimeout('up()',40);
  } else clearTimeout(t);
  return false;
}