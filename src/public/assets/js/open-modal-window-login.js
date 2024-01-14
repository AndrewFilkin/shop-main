document.getElementById('openModalBtnLogin').addEventListener('click', function() {
    document.getElementById('registrationModalLogin').style.display = 'block';
});

document.getElementById('closeModalBtnLogin').addEventListener('click', function() {
    document.getElementById('registrationModalLogin').style.display = 'none';
});

document.getElementById('registrationModalLogin').addEventListener('click', function(e) {
    if (e.target === document.getElementById('registrationModalLogin')) {
        document.getElementById('registrationModalLogin').style.display = 'none';
    }
});

// document.getElementById('registrationForm').addEventListener('submit', function(e) {
//     e.preventDefault();
//     // Добавьте здесь логику регистрации пользователя
// });
//
// document.getElementById('googleLoginBtn').addEventListener('click', function() {
//     // Добавьте здесь логику регистрации через Google
// });
