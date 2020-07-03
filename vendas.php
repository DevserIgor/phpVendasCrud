<?php require_once 'global.php' ?>
<?php

    try {
        $venda = new Venda();
        $lista = $venda->listar();
    } catch(Exception $e) {
        Erro::trataErro($e);
    }

?>

<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Vendas</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="vendas-cadastrar.php" class="btn btn-info btn-block">Vender</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
            <tr>
                <th>Data</th>
                <th>Cliente</th>
                <th>Valor</th>
                <th>Desconto</th>
                <th>Frete</th>                                
                <th class="acao">Excluir</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $linha): ?>
                <tr>
                    <td><?php echo $linha['VenData'] ?></td>
                    <td><?php echo $linha['CliNome'] ?></td>
                    <td><?php echo number_format($linha['VenValor'], 2, '.', '')?></td>                    
                    <td><?php echo number_format($linha['VenDesconto'], 2, '.', '')?></td>
                    <td><?php echo number_format($linha['VenFrete'], 2, '.', '')?></td>                    
                    <td><a href="vendas-excluir-post.php?codigo=<?php echo $linha['VenCodigo'] ?>" class="btn btn-danger">Excluir</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'rodape.php' ?>
