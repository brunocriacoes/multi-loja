<?php

class Comprador extends Banco
{
    function __construct()
    {
        parent::__construct();
    }
    function all() {
        $sql = "SELECT * FROM comprador";
        return $this->query($sql);
    }
    function get_name( $id ) {
        $sql = "SELECT * FROM comprador WHERE id=$id";
        $result = $this->query($sql);
        return $result[0]['nome'];
    }
}