<?php require_once "global.php" ?>

<?php
    try {
    $codigo = $_GET['codigo'];
    $produto = new Produto($codigo);

    $produto->excluir();

    header('Location: produtos.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }