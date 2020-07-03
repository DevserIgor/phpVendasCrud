<?php require_once 'global.php' ?>

<?php
    try {
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $fantasia = $_POST['fantasia'];        
        $cnpj = $_POST['cnpj'];
        $endereco = $_POST['endereco'];
        $fone = $_POST['fone'];

        $fornecedor = new Fornecedor($codigo);
        $fornecedor->nome = $nome;
        $fornecedor->fantasia = $fantasia;
        $fornecedor->cnpj = $cnpj;        
        $fornecedor->endereco = $endereco;        
        $fornecedor->fone = $fone;        

        $fornecedor->atualizar();

        header('Location: fornecedores.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }

