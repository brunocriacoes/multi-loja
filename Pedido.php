<?php

class Pedido extends Banco
{
    function __construct()
    {
        parent::__construct();
    }
    function all($adm=0) {
        $sql = "SELECT * FROM pedido";
        return $this->query($sql);
    }
    function add($comprador_id) {
        
        $sql = "INSERT INTO pedido (total, comprador_id,status) VALUES (0,$comprador_id, 'await')";
        $this->exec($sql);
    }
    function get_prod($id) {
        $sql = "SELECT * FROM produto WHERE id=$id";
        $result = $this->query($sql);
        return $result[0];
    }
    function add_item($pedido_id, $produto_id,$quantidade) {
        $prod = $this->get_prod($produto_id);
        $fornecedor_id = $prod['fornecedor_id'];     
        $sql = "INSERT INTO pedido_iten (pedido_id, fornecedor_id, produto_id,quantidade) ";
        $sql .= "VALUES ($pedido_id, $fornecedor_id, $produto_id, $quantidade)";
        $this->exec($sql);
    }
    function intens($id) {
        $sql = "SELECT * FROM pedido_iten WHERE pedido_id = $id";
        return $this->query($sql);
    }
}