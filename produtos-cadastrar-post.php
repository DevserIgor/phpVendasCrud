<?php require_once 'global.php' ?>

<?php
    try {
        $produto = new Produto();

        $descricao = $_POST['descricao'];
        $categoria = $_POST['categoria'];
        $fornecedor = $_POST['fornecedor'];        
        $precoVenda = $_POST['precoVenda'];
        $margemLucro = $_POST['margemLucro'];
        $estoque = $_POST['estoque'];

        
        $produto->descricao = $descricao;
        $produto->catCodigo = $categoria;
        $produto->forCodigo = $fornecedor;        
        $produto->precoVenda = $precoVenda;        
        $produto->margemLucro = $margemLucro;        
        $produto->estoque = $estoque;        

        $produto->inserir();

        header('Location: produtos.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }

