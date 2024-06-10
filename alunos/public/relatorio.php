<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../src/modules/sweetalert2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Formulário Básico</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<header>
    <br>
    <br>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Relatorios de Alunos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.instagram.com/guilherme_5547/">Instagram</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://github.com/Gui1284">GitHub</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body>
    <br>
    <h1 class="total_aluno"></h1>
    <br>
    <br>

    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Idade</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody class="table_dados">

            </tbody>
        </table>
    </div>
</body>
<script src="../src/modules/jquery-3.7.1.min.js"></script>
<script src="../src/js/script.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(getGenero);

    function drawChart(maleCount, femaleCount) {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Masculino', maleCount],
            ['Feminino', femaleCount],
        ]);

        var options = {
            title: 'Sexo por alunos',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>

</html>