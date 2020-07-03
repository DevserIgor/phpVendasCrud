<?php require_once 'global.php' ?>

<?php
    try {
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];        
        $cnpj = $_POST['cnpj'];
        $endereco = $_POST['endereco'];
        $bairro = $_POST['bairro'];

        $cliente = new Cliente($codigo);
        $cliente->nome = $nome;
        $cliente->cpf = $cpf;
        $cliente->cnpj = $cnpj;        
        $cliente->endereco = $endereco;        
        $cliente->bairro = $bairro;        

        $cliente->atualizar();

        header('Location: clientes.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }

