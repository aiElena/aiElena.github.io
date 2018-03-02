var slideNow = 1;
var slideCount = $('#slidewrapper').children().length;
var translateWidth = 0;
var slideInterval = 3000;
var navBtnId = 0;


$(document).ready(function () {
    var switchInterval = setInterval(nextSlide, slideInterval);


//1.остановка прокрутки слайда при наведении
//2.возобновление прокрутки при удаленни курсора

    $('#viewport').hover(function(){
        clearInterval(switchInterval);
	},function() {
        switchInterval = setInterval(nextSlide, slideInterval);
	});


	$('#next-btn').click(function() {
        nextSlide();
    });

//3.клик по "радио кнопке"
	$('.slide-nav-btn').click(function() {
        navBtnId = $(this).index();

        if (navBtnId + 1 != slideNow) {
            translateWidth = -$('#viewport').width() * (navBtnId);
            $('#slidewrapper').css({
                'transform': 'translate(' + translateWidth + 'px, 0)',
                '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
                '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
            });
            slideNow = navBtnId + 1;
        }
	});

});

//функция смены слайдов

function nextSlide() {
    if (slideNow == slideCount || slideNow <= 0 || slideNow > slideCount) {
        $('#slidewrapper').css('transform', 'translate(0, 0)');
        slideNow = 1;
    } else {
        translateWidth = -$('#viewport').width() * (slideNow);
        $('#slidewrapper').css({
            'transform': 'translate(' + translateWidth + 'px, 0)',
            '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
            '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
        });
        slideNow++;
    }
}