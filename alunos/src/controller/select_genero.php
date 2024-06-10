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

    $sqlMasculino = "SELECT COUNT(*) AS total_masculino FROM alunos WHERE genero = 'masculino'";
    $sqlFeminino = "SELECT COUNT(*) AS total_feminino FROM alunos WHERE genero = 'feminino'";

    // Executa a consulta para alunos masculinos
    $stmtMasculino = $conectado->prepare($sqlMasculino);
    $stmtMasculino->execute();
    $totalMasculino = $stmtMasculino->fetch(PDO::FETCH_ASSOC);

    // Executa a consulta para alunos femininos
    $stmtFeminino = $conectado->prepare($sqlFeminino);
    $stmtFeminino->execute();
    $totalFeminino = $stmtFeminino->fetch(PDO::FETCH_ASSOC);

    if ($totalMasculino && $totalFeminino > 0) {
        echo json_encode(array($totalMasculino,  $totalFeminino));
        exit;
    } else {
        echo json_encode(array("status_code" => 404, "msg" => "Nenhum dado a ser consultado", "type" => "error"));
        exit;
    }
} catch (PDOException $e) {
    echo json_encode(array("status_code" => 500, "msg" => "Internal Server Error", "type" => "error"));
    exit;
}
