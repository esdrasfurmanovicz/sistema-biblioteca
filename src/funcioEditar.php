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
                    <form action="funcioEditarPost.php" method="POST">
                        <div class="md-3 mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $funcionario->getNome(); ?>" required maxlength="100">
                        </div>
                        <div class="row mb-3">
                            <div class="md-3 col-6">
                                <label for="cpf" class="form-label">Cpf</label>
                                <input type="text" name="cpf" id="cpf" class="form-control" value="<?php echo $funcionario->getCpf(); ?>" required>
                            </div>
                            <div class="md-3 col-6">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" name="telefone" id="telefone" class="form-control" value="<?php echo $funcionario->getTelefone(); ?>" required>
                            </div>
                        </div>
                        <div class="md-3 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control" value="<?php echo $funcionario->getEmail(); ?>" required maxlength="100">
                        </div>
                        <div class="md-3 mb-3">
                            <button class='alterar'><a href="funcioAlterarSenha.php?id=<?php echo $funcionario->getId() ?>">Alterar Senha</a></button>
                        </div>
                        
                        
                        
                        <div class="md-3">
                            <input type="hidden" name="id" value="<?php echo $funcionario->getId(); ?>">
                            <button type="submit" class="enviar" onclick="submitForm()">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
        $('#cpf').mask('000.000.000-00', {reverse: true});
        $('#telefone').mask('(00) 00000-0000');
    })
    </script>
</body>

</html>