$(document).ready(function() {
    // Получаем ссылки на страницы (предположим, что страницы называются page1.html, page2.html и т.д.)
    var shirt = '/shop/shirt';
    var sweather = '/shop/sweather';
    var sunglass = '/shop/sunglass';

    // Обработчик события клика по чекбоксам
    $('input[type="checkbox"]').on('click', function() {
        // Проверяем, какие чекбоксы отмечены, и выполняем переход на соответствующую страницу
        if ($('#shirt').prop('checked')) {
            window.location.href = shirt;
        } else if ($('#sweather').prop('checked')) {
            window.location.href = sweather;
        } else if ($('#sunglass').prop('checked')) {
            window.location.href = sunglass;
        }
    });
});
