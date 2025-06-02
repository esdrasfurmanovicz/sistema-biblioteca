<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_GET['id'])){
    header("location: empresListAll.php");
    exit();
}
if($_GET["id"] == "" || $_GET["id"] == null){
    header("location: empresListAll.php");
    exit();
}
$empres = EmprestimoRepository::get($_GET["id"]);
if(!$empres){
    header("location: empresListAll.php");
    exit();
}

if(EmprestimoRepository::countByDataDevolucao($_GET["id"]) > 0){
    header("location: empresListAll.php");
    exit(); 
}
if(EmprestimoRepository::countByDataRenovacao($_GET["id"]) > 0){
    header("location: empresListAll.php");
    exit(); 
}
if(EmprestimoRepository::countByDataAlteracao($_GET["id"]) > 0){
    header("location: empresListAll.php");
    exit(); 
}


EmprestimoRepository::delete($empres->getId());

header("Location: empresListAll.php");