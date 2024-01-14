$(document).ready(function() {
    const menuIcon = document.getElementById("menu-icon");
    const sideMenu = document.getElementById("side-menu");

    // Закрывать меню при клике вне его области
    window.addEventListener("click", (event) => {
        if (event.target !== menuIcon && event.target !== sideMenu) {
            sideMenu.style.width = "0";
        }
    });

    menuIcon.addEventListener("click", () => {
        if (sideMenu.style.width === "250px") {
            sideMenu.style.width = "0";
        } else {
            sideMenu.style.width = "250px";
        }
    });
});
