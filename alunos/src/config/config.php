<?php
class conexao
{

    private $host = 'localhost';
    private $dbname = 'bd_alunos';
    private $user = 'root';
    private $passwd = '';

    public function connect()
    {

        try {
            $dsn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->passwd);
            return $dsn;
        } catch (Exception $e) {
            // echo $e->getMessage();
            echo "Internal Server Error";
            exit;
        }
    }
}
