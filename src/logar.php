<?php
include_once('include/factory.php');

if(!isset($_POST["cpf"])){
    header("Location: login.php");
    exit();
}
if(!isset($_POST["senha"])){
    header("Location: login.php");
    exit();
}

$cpf = $_POST["cpf"];
$senha = $_POST["senha"];

if(empty($cpf)){
    header("Location: login.php");
    exit();
}
if(empty($senha)){
    header("Location: login.php");
    exit();
}


$auth = Auth::login($cpf, $senha);
if(Auth::isAuthenticated()){
    header("Location: index.php");
    exit();
}

header("Location: login.php");
    exit();

