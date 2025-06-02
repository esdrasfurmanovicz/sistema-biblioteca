<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_POST['id'])){
    header("location: livroList.php");
    exit();
}
if($_POST["id"] == "" || $_POST["id"] == null){
    header("location: livroList.php");
    exit();
}
$livro = LivroRepository::get($_POST["id"]);
if(!$livro){
    header("location: livroList.php");
    exit();
}

if(!isset($_POST['titulo'])){
    header("Location: livroNovo.php?id=".$livro->getId());
    exit();
}
if($_POST["titulo"] == "" || $_POST["titulo"] == null){
    header("Location: livroNovo.php?id=".$livro->getId());
    exit();
}

date_default_timezone_set('America/Sao_Paulo');

$livro->setTitulo($_POST['titulo']);
$livro->setAno($_POST['ano']);
$livro->setGenero($_POST['genero']);
$livro->setIsbn($_POST['isbn']);
$livro->setAutorId($_POST['autor']);
$livro->setAlteracaoFuncionarioId($user->getID());
$livro->setDataAlteracao(date('Y-m-d H:i:s'));

LivroRepository::update($livro);



header("Location: livroEditar.php?id=".$livro->getId());