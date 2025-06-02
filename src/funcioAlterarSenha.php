<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: funcioList.php");
    exit();
}
if ($_GET['id'] == '' || $_GET['id'] == null) {
    header("Location: funcioList.php");
    exit();
}

$funcionario = FuncionarioRepository::get($_GET['id']);

if (!$funcionario) {
    header("Location: funcioList.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/novo.css">
</head>

<body>
    <?php include("include/menu.php") ?>
    <main>
        <div class="container">
            <h2>Funcionario > Editar</h2>
            <button class="voltar"><a href="funcioList.php">Voltar</a></button>
            <div class="row mt-4">
                <div class="col-md-12">
                    <form action="funcioAlterarSenhaPost.php" method="POST"> 
                        <div class="md-3">
                            <label for="senha" class="form-label">Nova Senha</label>
                                <input type="text" name="senha" id="senha" class="form-control input" required maxlength="100">
                        </div><div class="md-3">
                            <label for="repSenha" class="form-label">Repita a Senha</label>    
                                <input type="text" name="repSenha" id="repSenha" class="form-control input" required maxlength="100">
                        </div>
                        <div class="md-3">
                            <input type="hidden" name="id" value="<?php echo $funcionario->getId(); ?>">
                            <button type="submit" class="enviar">Alterar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="js/senha.js"></script>
</body>

</html>