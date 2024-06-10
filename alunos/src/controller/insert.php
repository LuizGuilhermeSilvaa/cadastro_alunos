<?php
require_once "../config/config.php";
header('Content-Type: application/json');

// verificando se todos os dados enviado pelo ajax foram todos recebidos
if (isset($_POST["nome"]) && $_POST["idade"] && $_POST["genero"] && $_POST["curso"]) {

    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $genero = $_POST["genero"];
    $curso = $_POST["curso"];

    $a = new newAluno();
    $a->aluno($nome, $idade, $genero, $curso);
} else {
    echo json_encode(array("status_code" => 400, "msg" => "Faltando informação", "type" => "error"));
    exit;
}

/**
 * Class newAluno
 *
 * Essa classe é responsavel por inserir o usuario no banco de dados.
 */
class newAluno
{
    public function aluno($nome, $idade, $genero, $curso)
    {
        try {
            $con = new conexao();
            $conectado = $con->connect();

            if (empty($conectado)) {
                echo json_encode(array("status_code" => 500, "msg" => "Houve um erro de conexão!", "type" => "error"));
                exit;
            }

            $sql = "INSERT INTO alunos (nome, idade, genero, curso) VALUES (:nome, :idade, :genero, :curso)";

            $stmt = $conectado->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":idade", $idade);
            $stmt->bindValue(":genero", $genero);
            $stmt->bindValue(":curso", $curso);
            $stmt->execute();
            $rowCount = $stmt->rowCount();

            if ($rowCount > 0) {
                echo json_encode(array("status_code" => 201, "msg" => "Inserido com sucesso", "type" => "success"));
                exit;
            }
        } catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                echo json_encode(array("status_code" => 409, "msg" => "Usuario já existe!", "type" => "error"));
                exit;
            } else {
                echo json_encode(array("status_code" => 500, "msg" => "Internal Server Error!", "type" => "error"));
                exit;
            }
        }
    }
}
