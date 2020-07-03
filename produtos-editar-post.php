<?php require_once 'global.php' ?>

<?php
    try {
        $codigo = $_POST['codigo'];
        $descricao = $_POST['descricao'];
        $categoria = $_POST['categoria'];
        $fornecedor = $_POST['fornecedor'];        
        $precoVenda = $_POST['precoVenda'];
        $margemLucro = $_POST['margemLucro'];
        $estoque = $_POST['estoque'];



        $produto = new Produto($codigo);        
        $produto->descricao = $descricao;
        $produto->catCodigo = $categoria;
        $produto->forCodigo = $fornecedor;        
        $produto->precoVenda = $precoVenda;        
        $produto->margemLucro = $margemLucro;        
        $produto->estoque = $estoque;         
        $produto->atualizar();

        header('Location: produtos.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }

