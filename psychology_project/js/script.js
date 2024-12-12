

/*------menu----------*/

$(function(){
	$('.menuToggle').on('click',function(){
		$('.nav__list').slideToggle(300, function(){
			if($(this).css('display') === 'none'){
				$(this).removeAttr('style');
			}
		});
	});
});

$(function(){
	$('.menu__icon').on('click',function(){
		$('.header__nav').toggleClass('menu_state_open');	
	});
});

/*----------------*/
    // Получаем текущий URL
    const currentPath = window.location.pathname;

    // Находим все ссылки в меню
    const navLinks = document.querySelectorAll('.nav__list .nav__link');

    navLinks.forEach(link => {
        // Сравниваем путь ссылки с текущим путем (игнорируя возможный базовый путь)
        if (currentPath.endsWith(link.getAttribute('href'))) {
            link.classList.add('active');
        }
    });


/*---------upbtn-----------*/
$('body').append('<div class="upbtn"></div>');
$(window).scroll(function() {
    if ($(this).scrollTop() > 500) {
        $('.upbtn').css({
            transform: 'scale(1)'
        });
        } else {
        $('.upbtn').css({
            transform: 'scale(0)'
        });
    }
});
$('.upbtn').on('click',function() {
    $('html, body').animate({
        scrollTop: 0
    }, 500);
    return false;
});

/*-------modal__register----------*/

document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("modal__register");
  const openModalBtns = document.querySelectorAll(".open-modal");
  const closeModalBtn = document.getElementById("closeModalRegisterBtn");

  // Функция для открытия модального окна
  function openModal() {
    modal.style.display = "block";
  }

  // Функция для закрытия модального окна
  function closeModal() {
    modal.style.display = "none";
  }

  // Открытие модального окна при клике на любую кнопку
  openModalBtns.forEach((btn) => {
    btn.addEventListener("click", openModal);
  });

  // Закрытие модального окна при клике на крестик
  closeModalBtn.addEventListener("click", closeModal);

  // Закрытие модального окна при клике за его пределами
  window.addEventListener("click", function (event) {
    if (event.target === modal) {
      closeModal();
    }
  });
});









