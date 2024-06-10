<?php
require_once "../config/config.php";
header('Content-Type: application/json');


// verificando se todos os dados enviado pelo ajax foram todos recebidos
if (isset($_POST["id_aluno"])) {

    $id_aluno = $_POST["id_aluno"];

    $a = new delete_aluno();
    $a->aluno($id_aluno);
} else {
    echo json_encode(array("status_code" => 400, "msg" => "Faltando informação", "type" => "error"));
    exit;
}

/**
 * Class delete_aluno
 *
 * Essa classe é responsavel por deletar o aluno.
 */
class delete_aluno
{
    public function aluno($id_aluno)
    {
        try {
            $con = new conexao();
            $conectado = $con->connect();

            if (empty($conectado)) {
                echo json_encode(array("status_code" => 500, "msg" => "Houve um erro de conexão!", "type" => "error"));
                exit;
            }

            $sql = "DELETE FROM alunos WHERE id_aluno=:id_aluno";

            $stmt = $conectado->prepare($sql);
            $stmt->bindValue(":id_aluno", $id_aluno);
            $stmt->execute();
            $rowCount = $stmt->rowCount();

            if ($rowCount > 0) {
                echo json_encode(array("status_code" => 204, "msg" => "Deletado com Sucesso", "type" => "success"));
                exit;
            } else {
                echo json_encode(array("status_code" => 500, "msg" => "Não foi possivel deletar o usuario", "type" => "error"));
                exit;
            }
        } catch (PDOException $e) {
            echo json_encode(array("status_code" => 500, "msg" => "Internal Server Error", "type" => "error"));
            exit;
        }
    }
}
