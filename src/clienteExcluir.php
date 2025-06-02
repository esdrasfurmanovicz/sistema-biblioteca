<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_GET['id'])){
    header("location: clienteList.php");
    exit();
}
if($_GET["id"] == "" || $_GET["id"] == null){
    header("location: clienteList.php");
    exit();
}
$cliente = ClienteRepository::get($_GET["id"]);
if(!$cliente){
    header("location: clienteList.php");
    exit();
}

if(EmprestimoRepository::countByClientes($cliente->getId()) > 0){
    header("location: clienteList.php");
    exit();
}

ClienteRepository::delete($cliente->getId());

header("Location: clienteList.php");