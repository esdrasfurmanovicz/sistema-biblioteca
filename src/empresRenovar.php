<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

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
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renovar Empréstimo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/novo.css">
</head>

<body>
    <?php include("include/menu.php"); ?>
    <main>
        <div class="container">
            <h2>Empréstimo > Renovar</h2>
            <button class="voltar"><a href="empresListAll.php">Voltar</a></button>
            <div class="row mt-4">
                <div class="col-md-12">
                    <form action="empresRenovarPost.php" method="POST">
                        <div class="row mb-3">
                            <div class="select col-6">
                                <label for="livro" class="form-label">Livro</label>
                                <select name="livroId" id="cliente" required>
                                    <?php
                                        foreach(LivroRepository::listAll() as $livro){
                                            if($empres->getLivroId() == $livro->getId()){
                                    ?>
                                        <option value="<?php echo $livro->getId();?>">
                                            <?php echo $livro->getTitulo(); ?>
                                        </option>
                                    <?php }} ?>
                                </select>
                            </div>
                            <div class="select col-6">
                                <label for="cliente" class="form-label">Cliente</label>
                                <select name="clienteId" id="cliente" required>
                                    <?php
                                        foreach(ClienteRepository::listAll() as $cliente){
                                            if($empres->getClienteId() == $cliente->getId()){;
                                    ?>
                                        <option value="<?php echo $cliente->getId();?>">
                                            <?php echo $cliente->getNome(); ?>
                                        </option>
                                    <?php }} ?>
                                </select>
                            </div>
                        </div>
                        <div class="md-3 mb-3">
                            <label for="dataVencimento" class="form-label">Nova Data de Vencimento</label>
                            <input type='text' name="dataVencimento" id="dataVencimento" class="form-control vencimento" required placeholder='dd/mm/aaaa' autocomplete='off' value="<?php $datetime = DateTime::createFromFormat('Y-m-d', EmprestimoRepository::autoCompleteVencimento());
                            echo $datetime->format('d/m/Y'); ?>" readonly>
                        </div>
                        <div class="md-3">
                            <input type="hidden" name="id" value="<?php echo $empres->getId(); ?>">
                            <button type="submit" class="enviar">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="js/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
<script src="moment.js"></script>
<script src="pikaday.js"></script>
<script>
    $(document).ready(function(){
        $('.vencimento').mask('00/00/0000');
    })
</script>

</html>