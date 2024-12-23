

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





$('.faq__item_faqAsk').click(function(){
	$(this).next().toggleClass('open').slideToggle(500);
	$(this).toggleClass('active');
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

/*------reviews--------*/
// Обработка звезд
document.querySelectorAll('#rating-container span').forEach(star => {
    star.addEventListener('click', () => {
        const ratingValue = star.getAttribute('data-value');
        document.getElementById('rating').value = ratingValue;

        // Обновить стиль для звезд
        document.querySelectorAll('#rating-container span').forEach(star => {
            star.style.color = star.getAttribute('data-value') <= ratingValue ? 'gold' : 'gray';
        });
    });
});

// Проверяем, существует ли форма с ID "review-form"
const reviewForm = document.getElementById('review-form');

if (reviewForm) {
    // Добавляем обработчик события submit
    reviewForm.addEventListener('submit', function (event) {
        event.preventDefault();

    // Получаем данные из формы
    const name = document.getElementById('name').value;
    const review = document.getElementById('review').value;
    const rating = document.getElementById('rating').value || 0; // Если рейтинг не выбран, установить 0
    const photoInput = document.getElementById('photo');

    // Проверяем, выбран ли файл
    let photoURL = 'https://via.placeholder.com/100'; // Аватар по умолчанию
    if (photoInput && photoInput.files.length > 0) {
        const photoFile = photoInput.files[0];
        photoURL = URL.createObjectURL(photoFile);
    }

    // Создаём новый элемент слайдера
    const newSlide = document.createElement('li');
    newSlide.innerHTML = `
        <div class="slider-container">
            <!-- Вставляем изображение (фото или аватар) -->
            <img src="${photoURL}" alt="${name}" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
            <h4>${name}</h4>
            <p>${review}</p>
            <p>Рейтинг: ${'★'.repeat(rating)}</p>
        </div>
    `;

    // Добавляем новый слайд в слайдер
    const slider = document.querySelector('#slider ul.slider__review');
    slider.appendChild(newSlide);

     //Если слайдов больше 4, удаляем первый
    const slides = slider.querySelectorAll('li');
    if (slides.length > 4) {
        slider.removeChild(slides[0]);
    }

    // Очищаем форму после отправки
    document.getElementById('review-form').reset();
});
}

/*--------------------*/

// Получение элементов модальных окон и кнопок
const loginModal = document.getElementById('loginModal');
const registerModal = document.getElementById('registerModal');
const closeLoginModal = document.getElementById('closeLoginModal');
const closeRegisterModal = document.getElementById('closeRegisterModal');
const openRegisterFromLogin = document.getElementById('openRegisterFromLogin');
const loginForm = document.getElementById('loginForm');
const registerForm = document.getElementById('registerForm');
const openModalButton = document.getElementById('openModal');
const logoutButton = document.getElementById('logout');

// Создание элемента для отображения сообщений
const messageBox = document.createElement('div');
messageBox.style.position = 'fixed';
messageBox.style.bottom = '20px';
messageBox.style.right = '20px';
messageBox.style.padding = '10px 20px';
messageBox.style.backgroundColor = '#4caf50';
messageBox.style.color = '#fff';
messageBox.style.borderRadius = '5px';
messageBox.style.boxShadow = '0 2px 5px rgba(0, 0, 0, 0.2)';
messageBox.style.display = 'none';
messageBox.style.zIndex = '1000';
document.body.appendChild(messageBox);

// Функция для отображения сообщения
function showMessage(message, duration = 3000) {
    messageBox.textContent = message;
    messageBox.style.display = 'block';
    setTimeout(() => {
        messageBox.style.display = 'none';
    }, duration);
}

// Функция для открытия модального окна
function openModal(modal) {
    modal.style.display = "flex";
}

// Функция для закрытия модального окна
function closeModal(modal) {
    modal.style.display = 'none';
}

// Открытие модального окна входа при клике на кнопку "Войти"
openModalButton.addEventListener('click', () => openModal(loginModal));

// Закрытие модальных окон при клике на кнопку закрытия
closeLoginModal.addEventListener('click', () => closeModal(loginModal));
closeRegisterModal.addEventListener('click', () => closeModal(registerModal));

// Переключение с окна входа на окно регистрации
openRegisterFromLogin.addEventListener('click', (event) => {
    event.preventDefault(); // Предотвращаем переход по ссылке
    closeModal(loginModal);
    openModal(registerModal);
});

// Закрытие модального окна при клике вне его
window.addEventListener('click', (event) => {
    if (event.target === loginModal) {
        closeModal(loginModal);
    }
    if (event.target === registerModal) {
        closeModal(registerModal);
    }
});
/*----------------------*/




// Сохранение данных пользователя в LocalStorage
function saveUser(name, email, password) {
    const users = JSON.parse(localStorage.getItem('users')) || [];
    users.push({ name, email, password });
    localStorage.setItem('users', JSON.stringify(users));
}

// Проверка пользователя при входе
function validateUser(email, password) {
    const users = JSON.parse(localStorage.getItem('users')) || [];
    return users.find(user => user.email === email && user.password === password);
}

// Обработка формы входа
loginForm.addEventListener('submit', (event) => {
    event.preventDefault(); // Предотвращаем отправку формы

    const email = loginForm.email.value;
    const password = loginForm.password.value;

    if (email && password) {
        const user = validateUser(email, password);
        if (user) {
            showMessage('Успешный вход! Перенаправление...', 3000);
            toggleAuthButtons(true);
			localStorage.setItem('currentUser', JSON.stringify(user)); // Сохраняем текущего пользователя			
            setTimeout(() => {
                window.location.href = 'profile.html';
            }, 3000);
        } else {
            showMessage('Неверный логин или пароль.', 3000);
        }
    } else {
        showMessage('Пожалуйста, заполните все поля для входа.', 3000);
    }
});

// Обработка формы регистрации
registerForm.addEventListener('submit', (event) => {
    event.preventDefault(); // Предотвращаем отправку формы

    const name = registerForm.name.value;
    const email = registerForm.email.value;
    const password = registerForm.password.value;

    if (name && email && password) {
        const users = JSON.parse(localStorage.getItem('users')) || [];
        const userExists = users.some(user => user.email === email);

        if (userExists) {
            showMessage('Пользователь с таким email уже зарегистрирован.', 3000);
        } else {
            saveUser(name, email, password);
            showMessage('Регистрация успешна! Перенаправление...', 3000);
            toggleAuthButtons(true);
 			
            setTimeout(() => {
                window.location.href = 'profile.html';
            }, 3000);
        }
    } else {
        showMessage('Пожалуйста, заполните все поля для регистрации.', 3000);
    }
});

// Проверяем пользователя при загрузке
document.addEventListener('DOMContentLoaded', () => {
    const currentUser = JSON.parse(localStorage.getItem('currentUser'));
    toggleAuthButtons(!!currentUser); // Устанавливаем кнопки в зависимости от статуса пользователя
});

// Функция для отображения кнопок входа и выхода
function toggleAuthButtons(isLoggedIn) {
    console.log(`toggleAuthButtons called with isLoggedIn: ${isLoggedIn}`);
    if (isLoggedIn) {
        openModalButton.style.display = 'none'; // Скрываем кнопку "Войти"
        logoutButton.style.display = 'block';  // Показываем кнопку "Выйти"
    } else {
        openModalButton.style.display = 'block'; // Показываем кнопку "Войти"
        logoutButton.style.display = 'none';    // Скрываем кнопку "Выйти"
    }
}

// Логика выхода
logoutButton.addEventListener('click', () => {
    console.log('Logout button clicked');
    showMessage('Вы вышли из системы.', 3000);
    localStorage.removeItem('currentUser'); // Удаляем текущего пользователя
    setTimeout(() => {
        toggleAuthButtons(false); // Устанавливаем состояние "не вошел" после небольшой задержки
    }, 300);
});


/*----------------*/
var HIDDEN_CLASS_NAME = 'hidden'
var TARGET_CLASS_NAME = 'target'
var SOURCE_CLASS_NAME = 'source'

var targetIdToShow = 1

function main() {
	var targets = getElements(TARGET_CLASS_NAME)
	var sources = getElements(SOURCE_CLASS_NAME)
	sources.forEach(function (sourceNode) {
		var sourceNodeId = extractId(sourceNode, SOURCE_CLASS_NAME)
		sourceNode.addEventListener('click', function () {
			showTarget(targets, sourceNodeId)
		})
	})
	showTarget(targets, targetIdToShow)
}

function getElements(type) {
	return [].slice.call(document.querySelectorAll('.' + type)).sort(function (targetNode1, targetNode2) {
		var target1Num = extractId(targetNode1, TARGET_CLASS_NAME)
		var target2Num = extractId(targetNode2, TARGET_CLASS_NAME)
		return target1Num > target2Num
	})
}

function extractId(targetNode, baseClass) {
	var currentClassIndex = targetNode.classList.length
	while (currentClassIndex--) {
		var currentClass = targetNode.classList.item(currentClassIndex)
		var maybeIdNum = parseInt(currentClass.split('-')[1])
		if (isNaN(maybeIdNum)) {
			continue
		}
		var classStrinToValidate = baseClass + '-' + maybeIdNum
		if (classStrinToValidate === currentClass) {
			return maybeIdNum
		}
	}
}

function showTarget(targets, targetId) {
	targets.forEach(function (targetNode, targetIndex) {
    var currentTargetNodeId = extractId(targetNode, TARGET_CLASS_NAME)
		if (currentTargetNodeId === targetId) {
			targetNode.classList.remove(HIDDEN_CLASS_NAME)
		} else {
			targetNode.classList.add(HIDDEN_CLASS_NAME)
		}
	})
}

main()















