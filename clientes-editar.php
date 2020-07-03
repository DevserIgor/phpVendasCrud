<?php require_once 'global.php' ?>
<?php
    try {
        $codigo = $_GET['codigo'];
        $cliente = new cliente($codigo);
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
?>
<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Cliente</h2>
    </div>
</div>
<form action="clientes-editar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="hidden" name="codigo" value="<?php echo $cliente->codigo ?>">
                <input name="nome" type="text" value="<?php echo $cliente->nome ?>" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input name="cpf" type="text" value="<?php echo $cliente->cpf ?>" class="form-control" placeholder="CPF">
            </div>
            <div class="form-group">
                <label for="cnpf">CNPJ</label>
                <input name="cnpj" type="text" value="<?php echo $cliente->cnpj?>" class="form-control" placeholder="CNPJ">
            </div>    

            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input name="endereco" type="text" value="<?php echo $cliente->endereco?>" class="form-control" placeholder="Endereço">
            </div>
            <div class="form-group">
                <label for="bairro">Bairro</label>
                <input name="bairro" type="text" value="<?php echo $cliente->bairro?>" class="form-control" placeholder="Bairro">
            </div>

            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>
<?php require_once 'rodape.php' ?>
