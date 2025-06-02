<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Autor Listagem</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="style/listagensIndx.css">
  <link rel="stylesheet" href="style/index.css">
</head>

<body>
    <?php include("include/excPopUp.php") ?>
    <?php include("include/menu.php") ?>
    <main>
        <div class="container">
            <div class="listagem">
                <h2>Autor > Listagem</h2>
                <button class="novo" onclick="link('autorNovo.php')">Novo Autor</button>
            </div>
            <button class="voltar"><a href="index.php">Voltar</a></button>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
              foreach(AutorRepository::listAll() as $autor){
              ?>
                        <tr>
                            <td><?php echo $autor->getId(); ?></td>
                            <td><?php echo $autor->getNome(); ?></td>
                            <td>
                                <a href="autorEditar.php?id=<?php echo $autor->getId(); ?>" class="editar">Editar</a>
                                <?php if(LivroRepository::countByAutor($autor->getId()) == 0){ ?>
                                <a class="deletar" onclick="popUpExc(<?php echo $autor->getId() ?>)">Deletar</a>
                                <?php }?>
                            </td>
                        </tr>
                        <?php
              }
              ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script src="js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script>
    function popUpExc(id){
      fundExc = document.querySelector(".fundExc")
      fundExc.style.display="flex"
      const cancelar = document.querySelector(".cancelar")
      cancelar.addEventListener("click", function(){
          closePopup()
      })
      const excluir = document.querySelector(".excluir")
      excluir.addEventListener("click", function(){
          const link = `autorExcluir.php?id=${id}`
          window.location = link
      }) 
  }

  function closePopup(){
      fundExc.style.display="none"
  }
  </script>
</body>

</html>