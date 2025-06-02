<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

if(!isset($_GET['id'])){
    header("Location: livroList.php");
    exit();
}
if($_GET['id'] == '' || $_GET['id'] == null){
    header("Location: livroList.php");
    exit();
}

$livro = LivroRepository::get($_GET['id']);

if (!$livro){
    header("Location: livroList.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/novo.css">
</head>
<body>
<?php include("include/menu.php") ?>
    <main>
        <div class="container">
            <h2>Livro > Editar</h2>
            <button class="voltar"><a href="livroList.php">Voltar</a></button>
            <div class="row mt-4">
                <div class="col-md-12">
                    <form action="livroEditarPost.php" method="POST">
                        <div class="md-3 mb-3">
                            <label for="titulo" class="form-label">Titulo</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $livro->getTitulo();?>" maxlength="200">
                        </div>
                        <div class="row mb-3">
                            <div class="md-3 col-4">
                                <label for="ano" class="form-label">Ano</label>
                                <input type="text" name="ano" id="ano" class="form-control" value="<?php echo $livro->getAno();?>" maxlength="4">
                            </div>
                            <div class="md-3 col-4">
                                <label for="genero" class="form-label">Genero</label>
                                <input type="text" name="genero" id="genero" class="form-control" value="<?php echo $livro->getGenero();?>" maxlength="100">
                            </div>
                            <div class="md-3 col-4">
                                <label for="isbn" class="form-label">Isbn</label>
                                <input type="text" name="isbn" id="isbn" class="form-control" value="<?php echo $livro->getIsbn();?>" maxlength="13">
                            </div>
                        </div>
                        <div class="md-3" class='select'>
                            <label for="autor" class="form-label">Autor</label> <br>
                            <select name="autor" id="autor" class="form-select">
                                <?php
                                    foreach(AutorRepository::listAll() as $autor){
                                ?>
                                <option value="<?php echo $autor->getId();?>"  <?php if($livro->getAutorId() == $autor->getId()){ echo "selected";} ?>>
                                        <?php echo $autor->getNome() ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div> 
                        <div class="md-3">
                            <input type="hidden" name="id" value="<?php echo $livro->getId();?>">
                            <button type="submit" class="enviar">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
        $('#ano').mask('0000');
    })
    </script>
</body>
</html>