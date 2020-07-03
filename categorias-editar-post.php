<?php require_once 'global.php' ?>

<?php
    try {
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $grupo = $_POST['grupo'];
        $subgrupo = $_POST['subgrupo'];

        $categoria = new Categoria($codigo);
        $categoria->nome = $nome;
        $categoria->grupo = $grupo;
        $categoria->subgrupo = $subgrupo;        

        $categoria->atualizar();

        header('Location: categorias.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }

