<?php require_once "global.php" ?>

<?php
    try {
    $codigo = $_GET['codigo'];
    $cliente = new Cliente($codigo);

    $cliente->excluir();

    header('Location: clientes.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }