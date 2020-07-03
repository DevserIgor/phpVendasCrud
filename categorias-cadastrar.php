<?php require_once 'cabecalho.php' ?>

<div class="row">
    <div class="col-md-12">
        <h2>Cadastrar Nova Categoria</h2>
    </div>
</div>

<form action="categorias-cadastrar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input name="nome" type="text" class="form-control" placeholder="Nome" required>
            </div>
            <div class="form-group">
                <label for="grupo">Grupo</label>
                <input name="grupo" type="text" class="form-control" placeholder="Grupo" required>
            </div>
            <div class="form-group">
                <label for="subgrupo">Sub Grupo</label>
                <input name="subgrupo" type="text" class="form-control" placeholder="Sub Grupo" required>
            </div>            
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
