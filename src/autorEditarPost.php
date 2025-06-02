<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_POST['id'])){
    header("location: autorList.php");
    exit();
}
if($_POST["id"] == "" || $_POST["id"] == null){
    header("location: autorList.php");
    exit();
}
$autor = AutorRepository::get($_POST["id"]);
if(!$autor){
    header("location: autorList.php");
    exit();
}

if(!isset($_POST['nome'])){
    header("Location: autorNovo.php?id=".$autor->getId());
    exit();
}
if($_POST["nome"] == "" || $_POST["nome"] == null){
    header("Location: autorNovo.php?id=".$autor->getId());
    exit();
}
date_default_timezone_set('America/Sao_Paulo');


$autor->setNome($_POST['nome']);
$autor->setAlteracaoFuncionarioId($user->getID());
$autor->setDataAlteracao(date('Y-m-d H:i:s'));

AutorRepository::update($autor);



header("Location: autorEditar.php?id=".$autor->getId());