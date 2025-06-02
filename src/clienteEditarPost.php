<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php"); 
    exit();
}

$user = Auth::getUser();

if(!isset($_POST['id'])){
    header("location: clienteList.php");
    exit();
}
if($_POST["id"] == "" || $_POST["id"] == null){
    header("location: clienteList.php");
    exit();
}
$cliente = ClienteRepository::get($_POST["id"]);
if(!$cliente){
    header("location: clienteList.php");
    exit();
}

if(!isset($_POST['nome'])){
    header("Location: clienteNovo.php?id=".$cliente->getId());
    exit();
}
if($_POST["nome"] == "" || $_POST["nome"] == null){
    header("Location: clienteNovo.php?id=".$cliente->getId());
    exit();
}

$email = $_POST["email"];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: clienteNovo.php");
    exit();
}


$cpf = $_POST["cpf"];
if ($cpf == ""){
    $cpf = null;
}
$rg = $_POST["rg"];
if ($rg == ""){
    $rg = null;
}

$datetime = DateTime::createFromFormat('d/m/Y', $_POST["dataNascimento"]);
$dateFormatted = $datetime->format('Y-m-d');
date_default_timezone_set('America/Sao_Paulo');

$cliente->setNome($_POST['nome']);
$cliente->setTelefone($_POST['telefone']);
$cliente->setEmail($email);
$cliente->setCpf($cpf);
$cliente->setRg($rg);
$cliente->setDataNascimento($dateFormatted);
$cliente->setAlteracaoFuncionarioId($user->getId());
$cliente->setDataAlteracao(date('Y-m-d H:i:s'));

ClienteRepository::update($cliente);



header("Location: clienteEditar.php?id=".$cliente->getId());