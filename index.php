<?php

include __DIR__ . "/Banco.php";
include __DIR__ . "/Comprador.php";
include __DIR__ . "/Fornecedor.php";
include __DIR__ . "/Pedido.php";
include __DIR__ . "/Produto.php";

$fornecedor = new Fornecedor();
$comprador = new Comprador();
$produto = new Produto();
$pedido = new Pedido();

$adm = $_REQUEST['adm'] ?? 0;

$acao = $_REQUEST['acao'] ?? '';

if ($acao == 'criar-pedido') {
    $pedido->add($_REQUEST['comprador_id']);
}
if ($acao == 'add-produto') {

    $pedido->add_item(
        $_REQUEST['pedido_id'],
        $_REQUEST['produto_id'],
        $_REQUEST['quantidade'],
    );
}

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi Loja</title>
</head>

<body>
    <form action="">
        <label for="">Relatorio por Fornecedor</label>
        <select name="adm">
            <option value="0">ADM</option>
            <?php foreach ($fornecedor->all() as $forn) : ?>
                <option value="<?= $forn['id'] ?>" <?= $forn['id'] == $adm ? 'selected': '' ?>  > <?= $forn['id'] ?> - <?= $forn['nome'] ?></option>
            <?php endforeach; ?>
        </select>
        <button>Visualizar</button>
    </form>
    <hr>
    <h4>Pedidos</h4>

    <?php foreach ($pedido->all($adm) as $forn) : ?>
        <hr>
        Numero pedido: <?= $forn['id'] ?> -
        total: <?= $forn['total'] ?> -
        comprador: <?= $comprador->get_name($forn['comprador_id']) ?> <br>
        <b>Itens</b>
        <?php $total = 0; ?>
        <ul>

            <?php foreach ($pedido->intens($forn['id']) as $item) : ?>
                <?php $fornecedor = $item['fornecedor_id']; ?>
                    <?php if($adm==0): ?>
                        <li>
                            Fornecedor: <?= $fornecedor ?>
                            Produto: <?= $item['produto_id'] ?>
                            quantidade: <?= $item['quantidade'] ?>
                            Subtotal: <?= $item['quantidade'] * $item['quantidade'] ?>
                            <?php $total += $item['quantidade'] * $item['quantidade']; ?>
                        </li>
                    <?php endif;?> 
                    <?php if($adm!=0&&$fornecedor==$adm): ?>
                        <li>
                            Fornecedor: <?= $fornecedor ?>
                            Produto: <?= $item['produto_id'] ?>
                            quantidade: <?= $item['quantidade'] ?>
                            Subtotal: <?= $item['quantidade'] * $item['quantidade'] ?>
                            <?php $total += $item['quantidade'] * $item['quantidade']; ?>
                        </li>
                    <?php endif;?>

            <?php endforeach; ?>

            total: <?= $total ?>
        </ul>

    <?php endforeach; ?>

    <hr>
    <h3>Criar Pedido</h3>
    <form action="" method="POST">
        <input type="hidden" name="acao" value="criar-pedido">
        <label for="">comprador</label> <br>
        <select name="comprador_id">
            <?php foreach ($comprador->all() as $forn) : ?>
                <option value="<?= $forn['id'] ?>"><?= $forn['nome'] ?></option>
            <?php endforeach; ?> <br>
        </select>
        <button>Criar</button>
    </form>
    <hr>
    <h3>Adicionar produto a pedidos</h3>
    <form action="" method="POST">
        <input type="hidden" name="acao" value="add-produto">
        <label for="">pedido</label> <br>
        <select name="pedido_id" id="">
            <?php foreach ($pedido->all() as $forn) : ?>
                <option value="<?= $forn['id'] ?>"><?= $forn['id'] ?></option>
            <?php endforeach; ?>
        </select> <br>
        <label for="">produto</label> <br>
        <select name="produto_id" id="">
            <?php foreach ($produto->all() as $forn) : ?>
                <option value="<?= $forn['id'] ?>"><?= $forn['nome'] ?></option>
            <?php endforeach; ?>
        </select> <br>
        <label for="">quantidade</label> <br>
        <input type="number" maxlength="99" style="width: 50px;" name="quantidade"> <br>
        <button>adicionar produto</button>
    </form>
    <br> <br> <br>
</body>

</html>