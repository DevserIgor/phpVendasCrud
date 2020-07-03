<?php require_once 'global.php' ?>
<?php
    try {
        $codigo = $_GET['codigo'];
        $fornecedor = new Fornecedor($codigo);
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
?>
<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Fornecedor</h2>
    </div>
</div>
<form action="fornecedores-editar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="hidden" name="codigo" value="<?php echo $fornecedor->codigo ?>">
                <input name="nome" type="text" value="<?php echo $fornecedor->nome ?>" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="fantasia">Fantasia</label>
                <input name="fantasia" type="text" value="<?php echo $fornecedor->fantasia ?>" class="form-control" placeholder="Fantasia">
            </div>
            <div class="form-group">
                <label for="cnpf">CNPJ</label>
                <input name="cnpj" type="text" value="<?php echo $fornecedor->cnpj?>" class="form-control" placeholder="CNPJ">
            </div>    

            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input name="endereco" type="text" value="<?php echo $fornecedor->endereco?>" class="form-control" placeholder="Endereço">
            </div>
            <div class="form-group">
                <label for="fone">Fone</label>
                <input name="fone" type="text" value="<?php echo $fornecedor->fone?>" class="form-control" placeholder="Fone">
            </div>

            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>
<?php require_once 'rodape.php' ?>