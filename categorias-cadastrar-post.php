<?php
    require_once 'global.php';

    try {
        $categoria = new Categoria();
        $nome = $_POST['nome'];
        $grupo = $_POST['grupo'];
        $subgrupo = $_POST['subgrupo'];        

        $categoria->nome = $nome;
        $categoria->grupo = $grupo;
        $categoria->subgrupo = $subgrupo;
        

        $categoria->inserir();

        header('Location: categorias.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }