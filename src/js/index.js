function link(paraOnde){
    window.location = paraOnde;
}

function validateEmail() {
    var email = document.getElementById('email').value;
    var regex = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
        if (!regex.test(email)) {
            alert('Por favor, insira um e-mail válido.');
            document.getElementById('email').focus();
            return false;
        } else {
            return true;
        }
    }

function submitForm() {
    if (validateEmail()) {
        document.getElementById("formulario").submit();
    }
}