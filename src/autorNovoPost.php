<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_POST['nome'])){
    header("Location: autorNovo.php");
    exit();
}
if($_POST["nome"] == '' || $_POST["nome"] == null){
    header("Location: autorNovo.php");
    exit();
}
date_default_timezone_set('America/Sao_Paulo');
$autor = Factory::autor();

$autor->setNome($_POST['nome']);
$autor->setinclusaoFuncionarioId($user->getId());
$autor->setDataInclusao(date('Y-m-d H:i:s'));

$autor_retorno = AutorRepository::insert($autor);

if($autor_retorno > 0){
    header("Location: autorEditar.php?id=".$autor_retorno);
    exit();
}

header("Location: autorNovo.php");
    exit();
