<?php

class Fornecedor extends Banco
{
    function __construct()
    {
        parent::__construct();
    }
    function all() {
        $sql = "SELECT * FROM fornecedor";
        return $this->query($sql);
    }
    function get_name( $id ) {
        $sql = "SELECT * FROM fornecedor WHERE id=$id";
        $result = $this->query($sql);
        return $result[0]['nome'];
    }
}
