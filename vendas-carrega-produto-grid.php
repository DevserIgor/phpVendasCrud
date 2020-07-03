<?php require_once 'global.php' ?>

<?php
    try {
        $codigo = $_POST['codigo'];
        $produto = new Produto($codigo);
        $json = $produto->getProduto();
        print_r($json);
        
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
