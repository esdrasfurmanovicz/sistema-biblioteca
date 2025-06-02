<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_GET['id'])){
    header("location: livroList.php");
    exit();
}
if($_GET["id"] == "" || $_GET["id"] == null){
    header("location: livroList.php");
    exit();
}
$livro = livroRepository::get($_GET["id"]);
if(!$livro){
    header("location: livroList.php");
    exit();
}

if(EmprestimoRepository::countByLivros($livro->getId()) > 0){
    header("location: livroList.php");
    exit();
}

LivroRepository::delete($livro->getId());

header("Location: livroList.php");