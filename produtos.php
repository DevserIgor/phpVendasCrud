<?php require_once 'global.php' ?>
<?php

    try {
        $produto = new Produto();
        $lista = $produto->listar();
    } catch(Exception $e) {
        Erro::trataErro($e);
    }

?>

<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Produtos</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="produtos-cadastrar.php" class="btn btn-info btn-block">Cadastrar Novo Produto</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
            <tr>
                <th>Codigo</th>
                <th>Decrição</th>
                <th>Categoria</th>
                <th>Fornecedor</th>
                <th>Preço de Venda</th>
                <th>Margem de Lucro</th>
                <th>Qtd.Estoque</th>
                <th class="acao">Editar</th>
                <th class="acao">Excluir</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $linha): ?>
                <tr>
                    <td><?php echo $linha['ProCodigo'] ?></td>
                    <td><?php echo $linha['ProDescricao'] ?></td>
                    <td><?php echo $linha['CatNome'] ?></td>                    
                    <td><?php echo $linha['ForNome'] ?></td>
                    <td>R$ <?php echo number_format($linha['ProPrecoVenda'], 2, '.', '') ?></td>
                    <td><?php echo $linha['ProMargemLucro']."%" ?></td>
                    <td><?php echo $linha['ProEstoque']."Uni." ?></td>
                    <td><a href="produtos-editar.php?codigo=<?php echo $linha['ProCodigo']?>" class="btn btn-info">Editar</a></td>
                    <td><a href="produtos-excluir-post.php?codigo=<?php echo $linha['ProCodigo'] ?>" class="btn btn-danger">Excluir</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'rodape.php' ?>
