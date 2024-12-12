/*------breadcrumbs--------*/

document.addEventListener("DOMContentLoaded", function () {
    let breadcrumbsList = document.getElementById("breadcrumbs-list");
    let breadcrumbsNav = document.querySelector(".breadcrumbs");
    // Получаем текущий путь
    let currentPath = window.location.pathname.split("/").pop();

    // Стартовая цепочка хлебных крошек
    let breadcrumbs = [
        { name: "Главная", url: "index.html" }, // Главная страница
    ];

    if (currentPath === "index.html" || currentPath === "") {
        // Скрыть хлебные крошки на главной странице
        breadcrumbsNav.style.display = "none";
        return;
    }

    // Проверка текущей страницы и добавление крошек
    if (currentPath === "blog.html") {
        breadcrumbs.push({ name: "Статьи", url: "blog.html" });
    } else if (currentPath === "about.html") {
        breadcrumbs.push({ name: "Статьи", url: "blog.html" });
        breadcrumbs.push({ name: "О нас", url: "about.html" });
    } else if (currentPath === "contacts.html") {
        breadcrumbs.push({ name: "Статьи", url: "blog.html" });
        breadcrumbs.push({ name: "О нас", url: "about.html" });
        breadcrumbs.push({ name: "Контакты", url: "contacts.html" });
    } else if (currentPath.startsWith("blog__item")) {
        breadcrumbs.push({ name: "Статьи", url: "blog.html" });
        let articleTitle = document.querySelector(".blog__title-article");
        if (articleTitle) {
            breadcrumbs.push({ name: articleTitle.textContent, url: currentPath });
        }
    }

    // Очищаем список перед добавлением новых элементов
    breadcrumbsList.innerHTML = "";

    // Добавляем хлебные крошки в DOM
    breadcrumbs.forEach(function (breadcrumb, index) {
        let listItem = document.createElement("li");

        if (index === breadcrumbs.length - 1) {
            listItem.textContent = breadcrumb.name;
        } else {
            let link = document.createElement("a");
            link.href = breadcrumb.url;
            link.textContent = breadcrumb.name;
            listItem.appendChild(link);
        }

        breadcrumbsList.appendChild(listItem);
    });

    // Показываем хлебные крошки, если это не главная страница
    breadcrumbsNav.style.display = "block";
});