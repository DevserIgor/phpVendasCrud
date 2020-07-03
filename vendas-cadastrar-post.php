<?php require_once 'global.php' ?>

<?php
    try {
        $venda = new Venda();
        
        $data = date('Y/m/d');
        $cliCodigo = $_POST['cliente'];
        $venValor = $_POST['total'];
        $venDesconto = $_POST['desconto'];
        $venFrete = $_POST['frete'];        
        
        
        $venda->data = $data;
        $venda->cliCodigo = $cliCodigo;
        $venda->valor = $venValor;
        $venda->desconto = $venDesconto;
        $venda->frete = $venFrete;

        $venda->inserir();

        $vendaProduto = new VendaProduto();
        
        foreach ($_POST['codigo_produto'] as $produto) {
            $vendaProduto->venCodigo =  $venda->codigo;
            $vendaProduto->proCodigo = $produto;
            $vendaProduto->venQuantidade = $_POST['qtd_prod_'.$produto];
            $vendaProduto->venValor = $venValor;
            $vendaProduto->venDesconto = $venDesconto;
            $vendaProduto->inserir();
        }
        
        header('Location: vendas.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }

