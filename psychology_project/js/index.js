
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


document.getElementById('review-form').addEventListener('submit', function (event) {
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


