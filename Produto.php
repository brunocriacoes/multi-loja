<?php

class Produto extends Banco
{
    function __construct()
    {
        parent::__construct();
    }
    function all() {
        $sql = "SELECT * FROM produto";
        return $this->query($sql);
    }
}