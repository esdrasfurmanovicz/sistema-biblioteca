<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

if(!isset($_GET['id'])){
    header("Location: autorList.php");
    exit();
}
if($_GET['id'] == '' || $_GET['id'] == null){
    header("Location: autorList.php");
    exit();
}

$autor = AutorRepository::get($_GET['id']);

if (!$autor){
    header("Location: autorList.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Autor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/novo.css">
</head>
<body>
<?php include("include/menu.php") ?>
    <main>
        <div class="container">
            <h2>Autor > Editar</h2>
            <button class="voltar"><a href="autorList.php">Voltar</a></button>
            <div class="row mt-4">
                <div class="col-md-12">
                    <form action="autorEditarPost.php" method="POST">
                        <div class="md-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $autor->getNome();?>" required maxlenght="100">
                        </div>
                        <div class="md-3">
                            <input type="hidden" name="id" value="<?php echo $autor->getId();?>">
                            <button type="submit" class="enviar">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>