    document.getElementById("contact-form").addEventListener("submit", function(event) {
        event.preventDefault(); // Отключить стандартную отправку формы

        // Вывод сообщения об успешной отправке
        showMessage("Ваше сообщение успешно отправлено!");

        // Сброс формы
        event.target.reset();
    });

    function showMessage(message) {
        const responseMessage = document.getElementById("response-message");
        responseMessage.textContent = message;
        responseMessage.classList.add("visible");

        // Убрать сообщение через 3 секунды
        setTimeout(() => {
            responseMessage.classList.remove("visible");
        }, 3000);
    }
