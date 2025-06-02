<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_GET['id'])){
    header("location: autorList.php");
    exit();
}
if($_GET["id"] == "" || $_GET["id"] == null){
    header("location: autorList.php");
    exit();
}
$autor = AutorRepository::get($_GET["id"]);
if(!$autor){
    header("location: autorList.php");
    exit();
}

if(LivroRepository::countByAutor($autor->getId()) > 0){
    header("location: autorList.php");
    exit();
}

AutorRepository::delete($autor->getId());

header("Location: autorList.php");