<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        #menu-icon {
            cursor: pointer;
            float: right;
            padding: 15px;
        }
        #side-menu {
            width: 0;
            height: 100%;
            position: fixed;
            top: 0;
            right: 0;
            background-color: #f1f1f1;
            overflow-x: hidden;
            transition: 0.3s;
            padding-top: 60px;
        }
        #side-menu a {
            padding: 8px 8px 8px 16px;
            text-decoration: none;
            font-size: 20px;
            color: #000;
            display: block;
            transition: 0.2s;
        }
        #side-menu a:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<i id="menu-icon">☰</i>

<div id="side-menu">
    <a href="#">Товар 1</a>
    <a href="#">Товар 2</a>
    <a href="#">Товар 3</a>
    <!-- Добавьте здесь дополнительные пункты меню -->
</div>

<script>
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
</script>
</body>
</html>
