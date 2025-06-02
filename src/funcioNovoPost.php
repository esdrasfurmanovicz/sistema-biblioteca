<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();
if(!isset($_POST['nome'])){

    header("Location: funcioNovo.php");
    exit();
}
if($_POST["nome"] == '' || $_POST["nome"] == null){

    header("Location: funcioNovo.php");
    exit();
}
date_default_timezone_set('America/Sao_Paulo');

$email = $_POST["email"];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: funcioNovo.php");
    exit();
}
if(FuncionarioRepository::verefyCpf($_POST["cpf"]) > 0){
    header("Location: funcioNovo.php");
    exit();
}

$cpf = $_POST["cpf"];
if ($cpf == ""){
    $cpf = null;
}

$funcio = Factory::funcionario();

$funcio->setNome($_POST['nome']);
$funcio->setCpf($cpf);
$funcio->setTelefone($_POST['telefone']);
$funcio->setEmail($email);
$funcio->setSenha($_POST['senha']);
$funcio->setinclusaoFuncionarioId($user->getID());
$funcio->setDataInclusao(date('Y-m-d H:i:s'));

$funcio_retorno = FuncionarioRepository::insert($funcio);

if($funcio_retorno > 0){
    header("Location: funcioEditar.php?id=".$funcio_retorno);
    exit();
}

header("Location: funcioNovo.php");
    exit();
