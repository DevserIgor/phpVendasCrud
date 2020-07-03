<?php require_once "global.php" ?>

<?php
    try {
    $codigo = $_GET['codigo'];
    $categoria = new Categoria($codigo);

    $categoria->excluir();

    header('Location: categorias.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }