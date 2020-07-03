<?php require_once "global.php" ?>

<?php
    try {
    $codigo = $_GET['codigo'];
    $venda = new Venda($codigo);
    $venda->excluir();
    
    $vendaProduto = new VendaProduto($codigo);
    $vendaProduto->excluir();


    header('Location: vendas.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }