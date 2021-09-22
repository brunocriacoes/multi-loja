<?php
class Banco
{
    private $host, $db, $user, $pass;
    function __construct()
    {
        $this->host = "localhost";
        $this->db = "multiloja";
        $this->user = "root";
        $this->pass = "";
    }
    function query(string $sql): array
    {
        $con = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
        $query = $con->query($sql);
        $result = $query->fetchAll();
        $con = null;
        return $result;
    }
    function exec(string $sql): void
    {
        $con = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
        $query = $con->query($sql);
        $con = null;
    }
}
