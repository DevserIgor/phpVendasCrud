<?php
    require_once 'global.php';

    try {
        $fornecedor = new Fornecedor();
        $nome = $_POST['nome'];
        $fantasia = $_POST['fantasia'];
        $cnpj = $_POST['cnpj'];
        $endereco = $_POST['endereco'];
        $fone = $_POST['fone'];        

        $fornecedor->nome = $nome;
        $fornecedor->fantasia = $fantasia;
        $fornecedor->cnpj = $cnpj;
        $fornecedor->endereco = $endereco;
        $fornecedor->fone = $fone;
        

        $fornecedor->inserir();

        header('Location: fornecedores.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }