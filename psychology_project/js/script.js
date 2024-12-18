

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

/*-----modal---loginForm-----*/

document.addEventListener("DOMContentLoaded", function() {
    const modal = document.getElementById("modal");
    const openModalBtn = document.getElementById("openModal");
    const closeModalBtn = document.getElementById("closeModalBtn");
    const loginForm = document.getElementById("loginForm");
    const loginMessage = document.getElementById("loginMessage");
    const logoutBtn = document.getElementById("logout"); // Кнопка "Выйти"

    // Проверка, если пользователь уже вошел
    if (localStorage.getItem("isLoggedIn") === "true") {
        // Если пользователь вошел, скрываем кнопку "Войти" и показываем "Выйти"
        openModalBtn.style.display = "none"; // Скрываем кнопку "Войти"
        loginMessage.textContent = "Вы успешно вошли!";
        loginMessage.style.display = "block";
        logoutBtn.style.display = "inline-block"; // Показываем кнопку "Выйти"
    } else {
        openModalBtn.style.display = "inline"; // Показываем кнопку "Войти", если не вошли
        logoutBtn.style.display = "none"; // Скрываем кнопку "Выйти"
    }

    // Открытие модального окна
    openModalBtn.onclick = function() {
        modal.style.display = "flex";
    };

    // Закрытие модального окна
    closeModalBtn.onclick = function() {
        modal.style.display = "none";
    };

    // Закрытие модального окна при клике вне его
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };

    // Обработка формы входа
    loginForm.onsubmit = function(event) {
        event.preventDefault();
        const email = document.getElementById("email").value.trim().toLowerCase();
        const password = document.getElementById("password").value.trim();

        // Простая проверка данных
        if (email === "user@example.com" && password === "password123") {
            localStorage.setItem("isLoggedIn", "true"); // Сохранение статуса в localStorage
            loginMessage.textContent = "Вы успешно вошли!";
            loginMessage.style.display = "block";
            loginForm.style.display = "none"; // Прячем форму

            // Меняем кнопку "Войти" на кнопку "Выйти"
            openModalBtn.style.display = "none";
            logoutBtn.style.display = "inline-block"; // Показываем кнопку "Выйти"
            setTimeout(function() {
                modal.style.display = "none"; // Закрытие модального окна через 2 секунды
            }, 2000);
        } else {
            loginMessage.textContent = "Неверные данные. Попробуйте снова.";
            loginMessage.style.color = "red";
            loginMessage.style.display = "block";
        }
    };

    // Выход из аккаунта
    logoutBtn.onclick = function() {
        localStorage.removeItem("isLoggedIn");
        loginMessage.style.display = "none";
        loginForm.style.display = "block"; // Показываем форму входа снова
        openModalBtn.style.display = "inline"; // Показываем кнопку "Войти"
        logoutBtn.style.display = "none"; // Скрываем кнопку "Выйти"
    };
});









