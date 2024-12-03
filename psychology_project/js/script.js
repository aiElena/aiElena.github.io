$('.faq__item_faqAsk').click(function(){
	$(this).next().toggleClass('open').slideToggle(500);
	$(this).toggleClass('active');
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

/*------reviews--------*/

document.addEventListener("DOMContentLoaded", function () {
  const carousel = document.querySelector('.carousel');
  const reviewForm = document.getElementById('review-form');
  const ratingStars = document.querySelectorAll('#rating-container span');
  const ratingInput = document.getElementById('rating');
  const messageDiv = document.createElement('div'); // Сообщение об успешном добавлении
  document.body.appendChild(messageDiv); // Добавляем сообщение в конец страницы

  let currentIndex = 0;
  let isAnimating = false;

  // Настройка стилей для сообщения
  messageDiv.id = "success-message";
  messageDiv.style.position = "fixed";
  messageDiv.style.bottom = "120px";
  messageDiv.style.left = "50%";
  messageDiv.style.transform = "translateX(-50%)";
  messageDiv.style.padding = "10px 20px";
  messageDiv.style.backgroundColor = "#007bff";
  messageDiv.style.color = "white";
  messageDiv.style.fontSize = "16px";
  messageDiv.style.borderRadius = "5px";
  messageDiv.style.display = "none";

  // Функция для показа сообщения
  function showMessage(text) {
    messageDiv.textContent = text;
    messageDiv.style.display = "block";
    setTimeout(() => {
      messageDiv.style.display = "none";
    }, 3000); // Сообщение исчезает через 3 секунды
  }

  // Функция обновления карусели
  function updateCarousel() {
    const offset = -currentIndex * 100;
    carousel.style.transition = isAnimating ? "transform 0.5s ease-in-out" : "none";
    carousel.style.transform = `translateX(${offset}%)`;
  }

  // Функция для зацикливания карусели
  function loopCarousel() {
    setInterval(() => {
      if (isAnimating) return; // Ожидаем завершения анимации
      currentIndex++;
      if (currentIndex >= carousel.children.length) {
        isAnimating = true;
        currentIndex = 0;
        // Сбрасываем позицию карусели после завершения анимации
        setTimeout(() => {
          isAnimating = false;
          updateCarousel();
        }, 500); // Задержка равна времени анимации (0.5s)
      }
      updateCarousel();
    }, 3000); // Прокрутка каждые 3 секунды
  }

  // Обработчик выбора рейтинга
  ratingStars.forEach(star => {
    star.addEventListener('click', () => {
      ratingStars.forEach(s => s.classList.remove('selected'));
      star.classList.add('selected');
      ratingInput.value = star.dataset.value;

      // Окрашиваем звёздочки
      ratingStars.forEach(s => {
        if (s.dataset.value <= star.dataset.value) {
          s.classList.add('selected');
        } else {
          s.classList.remove('selected');
        }
      });
    });
  });

  // Обработчик отправки формы
  reviewForm.addEventListener('submit', function (e) {
    e.preventDefault();

    const name = document.getElementById('name').value;
    const review = document.getElementById('review').value;
    const rating = ratingInput.value;

    if (!rating) {
      alert('Пожалуйста, выберите рейтинг.');
      return;
    }

    // Создаем новый отзыв
    const newReview = document.createElement('div');
    newReview.classList.add('carousel-item');
    newReview.innerHTML = `
      <p>"${review}"</p>
      <p>- ${name}</p>
      <div class="stars" data-rating="${rating}">${'★'.repeat(rating)}${'☆'.repeat(5 - rating)}</div>
    `;

    // Добавляем новый отзыв в конец
    carousel.appendChild(newReview);

    // Если количество отзывов превышает 5, удаляем первый
    if (carousel.children.length > 5) {
      carousel.removeChild(carousel.children[0]);
    }

    // Обновляем карусель
    currentIndex = carousel.children.length - 1;
    updateCarousel();

    // Показываем сообщение об успешном добавлении
    showMessage("Отзыв успешно добавлен!");

    // Сбрасываем форму
    reviewForm.reset();
    ratingStars.forEach(star => star.classList.remove('selected'));
    ratingInput.value = '';
  });

  // Инициализация
  updateCarousel();
  loopCarousel();
});

/*---------upbtn-----------*/

$('body').append('<div class="upbtn"></div>');
$(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
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












			





























			














