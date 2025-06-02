<?php
include_once('include/factory.php');
if(!Auth::isAuthenticated()){
    header("Location: logout.php");
    exit();
}
?> 
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gnodex Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/home.css">
    <style>
        #chart_div{
            margin: auto;
            width: 80vw;
            height: 60vh;
        }
    </style>
</head>

<body>
    <?php include("include/menu.php")?>
    <main>
        <section class="container">
            <h1>Bem vindo a Biblioteca <strong>Gnodex!</strong></h1>
            <div id="jobs">
                <div class="block b1" onclick="link('autorList.php')">
                    <p>Autor</p>
                </div>

                <div class="block b2" onclick="link('livroList.php')">
                    <p>Livros</p>
                </div>

                <div class="block b3" onclick="link('clienteList.php')">
                    <p>Clientes</p>
                </div>

                <div class="block b4" onclick="link('funcioList.php')">
                    <p>Funcionarios</p>
                </div>

                <div class="block b5" onclick="link('empresListAll.php')">
                    <p>Emprestimo</p>
                </div>


            </div>
        </section>
        <div id="chart_div"></div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>

        google.charts.load('current', {
            'packages': ['corechart']
        });


        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Mes');
            data.addColumn('number', 'Emprestimos');

            data.addRows([
                ['Jan', <?php echo EmprestimoRepository::countMes(1); ?>],
                ['Fev', <?php echo EmprestimoRepository::countMes(2); ?>],
                ['Mar', <?php echo EmprestimoRepository::countMes(3); ?>],
                ['Abr', <?php echo EmprestimoRepository::countMes(4); ?>],
                ['Mai', <?php echo EmprestimoRepository::countMes(5); ?>],
                ['Jun', <?php echo EmprestimoRepository::countMes(6); ?>],
                ['Jul', <?php echo EmprestimoRepository::countMes(7); ?>],
                ['Ago', <?php echo EmprestimoRepository::countMes(8); ?>],
                ['Set', <?php echo EmprestimoRepository::countMes(9); ?>],
                ['Out', <?php echo EmprestimoRepository::countMes(10); ?>],
                ['Nov', <?php echo EmprestimoRepository::countMes(11); ?>],
                ['Dez', <?php echo EmprestimoRepository::countMes(12); ?>]
            ]);

            var options = {
                'title': 'Emprestimos realizados por Mes em 2024',
                'width': '70vw',
                'height': '100%'
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</body>

</html>