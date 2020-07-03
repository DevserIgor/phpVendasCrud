<?php require_once 'global.php' ?>
<?php
    try {
        $codigo = $_GET['codigo'];
        $categoria = new Categoria($codigo);
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
?>
<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Categoria</h2>
    </div>
</div>
<form action="Categorias-editar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="hidden" name="codigo" value="<?php echo $categoria->codigo ?>">
                <input name="nome" type="text" value="<?php echo $categoria->nome ?>" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="grupo">Grupo</label>
                <input name="grupo" type="text" value="<?php echo $categoria->grupo ?>" class="form-control" placeholder="Grupo">
            </div>
            <div class="form-group">
                <label for="subgrupo">Sub Grupo</label>
                <input name="subgrupo" type="text" value="<?php echo $categoria->subgrupo?>" class="form-control" placeholder="Sub Grupo">
            </div>                
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>
<?php require_once 'rodape.php' ?>
