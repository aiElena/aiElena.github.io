
document.addEventListener("DOMContentLoaded", () => {
  const chatMessages = document.getElementById("chatMessages");
  const chatInput = document.getElementById("chatInput");
 const sendButton = document.getElementById("sendButton");

  // Проверяем, что все элементы существуют
  if (!chatMessages || !chatInput || !sendButton) {
    console.error("Не все элементы чата найдены. Проверьте разметку.");
    return;
  }

  // Функция добавления сообщения
  const addMessage = (text, isUser = true) => {
    if (!text) return;

    const message = document.createElement("div");
    message.className = `message ${isUser ? "user" : "bot"}`;
    message.textContent = text;
    chatMessages.appendChild(message);

    // Прокрутка вниз
    chatMessages.scrollTop = chatMessages.scrollHeight;
  };

  // Обработка отправки сообщения
  const sendMessage = () => {
    const userMessage = chatInput.value.trim();
    if (userMessage) {
      addMessage(userMessage, true); // Добавляем сообщение пользователя
      chatInput.value = ""; // Очищаем поле ввода

      // Имитация ответа бота
      setTimeout(() => addMessage("Это ответ бота.", false), 1000);
    }
  };

  // Обработка клика на кнопку отправки
  sendButton.addEventListener("click", sendMessage);

  // Обработка нажатия Enter
  chatInput.addEventListener("keypress", (event) => {
    if (event.key === "Enter") {
      sendMessage();
    }
  });
});

// Открытие чата
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

// Закрытие чата
function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
