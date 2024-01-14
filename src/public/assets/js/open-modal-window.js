document.getElementById('openModalBtn').addEventListener('click', function() {
    document.getElementById('registrationModal').style.display = 'block';
});

document.getElementById('closeModalBtn').addEventListener('click', function() {
    document.getElementById('registrationModal').style.display = 'none';
});

document.getElementById('registrationModal').addEventListener('click', function(e) {
    if (e.target === document.getElementById('registrationModal')) {
        document.getElementById('registrationModal').style.display = 'none';
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
