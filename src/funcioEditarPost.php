<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_POST['id'])){
    header("location: funcioList.php");
    exit();
}
if($_POST["id"] == "" || $_POST["id"] == null){
    header("location: funcioList.php");
    exit();
}
$funcio = FuncionarioRepository::get($_POST["id"]);
if(!$funcio){
    header("location: funcioList.php");
    exit();
}

if(!isset($_POST['nome'])){
    header("Location: funcioNovo.php?id=".$funcio->getId());
    exit();
}
if($_POST["nome"] == "" || $_POST["nome"] == null){
    header("Location: funcioNovo.php?id=".$funcio->getId());
    exit();
}
date_default_timezone_set('America/Sao_Paulo');

$email = $_POST["email"];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: funcioNovo.php");
    exit();
}


$cpf = $_POST["cpf"];
if ($cpf == ""){
    $cpf = null;
}


$funcio->setNome($_POST['nome']);
$funcio->setCpf($cpf);
$funcio->setTelefone($_POST['telefone']);
$funcio->setSenha($_POST['senha']);
$funcio->setEmail($email);
$funcio->setAlteracaoFuncionarioId($user->getId());
$funcio->setDataAlteracao(date('Y-m-d H:i:s'));

FuncionarioRepository::update($funcio);



header("Location: funcioEditar.php?id=".$funcio->getId());