<?php
require_once "../config/config.php";
header('Content-Type: application/json');

try {
    $con = new conexao();
    $conectado = $con->connect();

    if (empty($conectado)) {
        echo json_encode(array("status_code" => 500, "msg" => "Houve um erro de conexão!", "type" => "error"));
        exit;
    }

    $sql = "SELECT COUNT(*) AS id_aluno FROM alunos";

    $sql = $conectado->prepare($sql);
    $sql->execute();
    $dados = $sql->fetch(PDO::FETCH_ASSOC);

    if ($dados > 0) {
        echo json_encode(array("total" => $dados));
        exit;
    } else {
        echo json_encode(array("status_code" => 404, "msg" => "Nenhum dado a ser consultado", "type" => "error"));
        exit;
    }
} catch (PDOException $e) {
    echo json_encode(array("status_code" => 500, "msg" => "Internal Server Error", "type" => "error"));
    exit;
}
