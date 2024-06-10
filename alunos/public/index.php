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
            <a class="navbar-brand" href="index.php">Cadastro de Alunos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="relatorio.php">Relatórios</a>
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
    <div class="form-container">
        <form id="form">
            <h2>Formulário</h2>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Nome Completo" required>

            <label for="idade">Idade:</label>
            <input type="number" maxlength="2" id="idade" name="idade" placeholder="Apenas números" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">

            <label for="genero">Sexo:</label>
            <select id="genero" name="genero" required>
                <option value="">Selecione</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                <option value="Outros">Outro</option>
            </select>
            <br>
            <label for="curso">Curso:</label>
            <input type="text" id="curso" name="curso" placeholder="Nome do curso" required>

            <button type="submit">Enviar</button>
        </form>
    </div>

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

    <script src="../src/modules/jquery-3.7.1.min.js"></script>
    <script src="../src/js/script.js"></script>

</body>

</html>