<?php
    require_once 'global.php';

    try {
        $cliente = new Cliente();
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $cnpj = $_POST['cnpj'];
        $endereco = $_POST['endereco'];
        $bairro = $_POST['bairro'];        

        $cliente->nome = $nome;
        $cliente->cpf = $cpf;
        $cliente->cnpj = $cnpj;
        $cliente->endereco = $endereco;
        $cliente->bairro = $bairro;
        

        $cliente->inserir();

        header('Location: clientes.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }