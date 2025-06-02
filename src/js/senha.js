document.getElementById('togglePassword').addEventListener('click', function () {
    var passwordInput = document.getElementById('senha');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }
});