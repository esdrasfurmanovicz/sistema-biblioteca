<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}



$user = Auth::getUser();

if(!isset($_POST['id'])){
    header("location: empresListAll.php");
    exit();
}
if($_POST["id"] == "" || $_POST["id"] == null){
    header("location: empresListAll.php");
    exit();
}
$empres = EmprestimoRepository::get($_POST["id"]);
if(!$empres){
    header("location: empresListAll.php");
    exit();
}

if(EmprestimoRepository::countByDataDevolucao($_POST["id"]) > 0){
    header("location: empresListAll.php");
    exit(); 
}
if(EmprestimoRepository::countByDataDevolucao($_POST["id"]) > 0){
    header("location: empresListAll.php");
    exit(); 
}


date_default_timezone_set('America/Sao_Paulo');

$empres->setAlteracaoFuncionarioId($user->getId());
$empres->setDevolucaoFuncionarioId($user->getId());
$empres->setDataAlteracao(date('Y-m-d H:i:s'));
$empres->setDataDevolucao(date('Y-m-d H:i:s'));

EmprestimoRepository::update($empres);

header("Location: empresListAll.php");