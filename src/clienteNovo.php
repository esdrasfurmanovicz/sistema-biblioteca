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
    <title>Novo Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/novo.css">
</head>

<body>
    <?php include("include/menu.php") ?>
    <main>
        <div class="container">
            <h2>Cliente > Novo</h2>
            <button class="voltar"><a href="clienteList.php">Voltar</a></button>
            <div class="row mt-4">
                <div class="col-md-12">
                    <form action="clienteNovoPost.php" method="POST" id="formulario">
                        <div class="md-3 mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" required maxlength="100">
                        </div>
                        <div class="row mb-3">
                            <div class="md-3 col-6">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" name="telefone" id="telefone" class="form-control" required>
                            </div>
                            <div class="md-3 col-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control" required maxlength="200">
                            </div>
                        </div>
                        <div class="md-3 mb-3">
                            <label for="cpf" class="form-label">Cpf</label>
                            <input type="text" name="cpf" id="cpf" class="form-control" >
                        </div>
                        <div class="md-3 mb-3">
                            <label for="rg" class="form-label">Rg</label>
                            <input type="text" name="rg" id="rg" class="form-control" >
                        </div>
                        <div class="md-3 mb-3">
                            <label for="datepicker" class="form-label">Data de Nacimento</label>
                            <input type='text' name="dataNascimento" id="datepicker" class="form-control nascimento" required placeholder='dd/mm/aaaa' autocomplete="off">
                        </div>
                        <div class="md-3">
                            <button type="submit" class="enviar" onclick="submitForm()">Salvar</button> 
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="js/jquery.mask.min.js"></script>
<script>
    var picker = new Pikaday({
        field: document.getElementById('datepicker'),
        minDate: new Date(1900, 0, 1),
        maxDate: new Date(),
        yearRange: [1900, new Date().getFullYear()],
        toString(date, format = 'DD/MM/YYYY') {
            const day = date.getDate().toString().padStart(2, '0');
            const month = (date.getMonth() + 1).toString().padStart(2, '0');
            const year = date.getFullYear();
            return `${day}/${month}/${year}`;
        },
        i18n: {
            previousMonth: 'Mês anterior',
            nextMonth: 'Próximo mês',
            months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
            weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
        },
        onSelect: function() {
            console.log(this.getMoment().format('DD/MM/YYYY'));
        }
    });
    $(document).ready(function(){
        $('.nascimento').mask('00/00/0000');
        $('#cpf').mask('000.000.000-00', {reverse: true});
        $('#rg').mask('00.000.000-0', {reverse: true});
        $('#telefone').mask('(00) 00000-0000');
    })

    
</script>

</html>