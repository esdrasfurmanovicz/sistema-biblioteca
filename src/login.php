<?php
include_once('include/factory.php');

if(Auth::isAuthenticated()){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Faça login ou cadastre-se na Biobliteca">
    <title>Login</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/senha.css">
    <link rel="stylesheet" href="style/login.css">
</head>

<body>
    <main>
        <div class="fund">

        </div>
        <div class="login">
            <div>
                <h1>Gnodex</h1>
                <p>Tão completo quanto a Biblioteca de Alexandria</p>
            </div>
            <div class="formulario">
                <form method="POST" id="loginForm" action="logar.php">
                    <div class="coolinput">
                        <label for="cpf" class="text">CPF:</label>
                        <input type="text" id="cpf" placeholder="000.000.000-00" name="cpf" class="input" required>
                    </div>
                    <div class="group">
                        <label class="container">
                            <input checked="checked" type="checkbox" id="togglePassword">
                            <svg viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg"
                                class="lock-open">
                                <path
                                    d="M352 144c0-44.2 35.8-80 80-80s80 35.8 80 80v48c0 17.7 14.3 32 32 32s32-14.3 32-32V144C576 64.5 511.5 0 432 0S288 64.5 288 144v48H64c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V256c0-35.3-28.7-64-64-64H352V144z">
                                </path>
                            </svg>
                            <svg viewBox="0 0 448 512" height="1em" xmlns="http://www.w3.org/2000/svg" class="lock">
                                <path
                                    d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z">
                                </path>
                            </svg>
                        </label>
                        <input class="input" type="password" name="senha" id="senha" placeholder="senha">
                    </div><br>
                    <button type="submit" id="entrar">Entrar</button>
                    <p><small>Esqueci a senha.</small></p>
                </form>
            </div>
        </div>
    </main>
    <script src="js/senha.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script>
    $(document).ready(function(){
        $('#cpf').mask('000.000.000-00', {reverse: true});
    })
    </script>
</body>

</html>
