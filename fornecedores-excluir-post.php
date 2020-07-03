<?php require_once "global.php" ?>

<?php
    try {
    $codigo = $_GET['codigo'];
    $fornecedor = new fornecedor($codigo);

    $fornecedor->excluir();

    header('Location: fornecedores.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }