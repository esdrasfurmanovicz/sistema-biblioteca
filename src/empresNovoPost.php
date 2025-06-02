<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_POST['dataVencimento'])){
    header("Location: empresNovo.php");
    exit();
}
if($_POST["dataVencimento"] == '' || $_POST["dataVencimento"] == null){
    header("Location: empresNovo.php");
    exit();
}



date_default_timezone_set('America/Sao_Paulo');

$datetime = DateTime::createFromFormat('d/m/Y', $_POST["dataVencimento"]);
$dateFormatted = $datetime->format('Y-m-d');
$emprestimo = Factory::emprestimo();


$emprestimo->setClienteId($_POST['clienteId']);
$emprestimo->setLivroId($_POST['livroId']);
$emprestimo->setDataVencimento($dateFormatted);
$emprestimo->setInclusaoFuncionarioId($user->getID());
$emprestimo->setDataInclusao(date('Y-m-d H:i:s'));
$emprestimo_retorno = EmprestimoRepository::insert($emprestimo);

if($emprestimo_retorno > 0){
    header("Location: empresListAll.php");
    exit();
}

header("Location: empresListAll.php");
    exit();
