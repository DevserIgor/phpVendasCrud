<?php require_once 'global.php' ?>
<?php

    try {
        $categoria = new Categoria();
        $lista = $categoria->listar();
    } catch(Exception $e) {
        Erro::trataErro($e);
    }

?>

<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Categorias</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="categorias-cadastrar.php" class="btn btn-info btn-block">Cadastrar Nova Categoria</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
            <tr>
                <th>Codigo</th>
                <th>Nome</th>
                <th>Grupo</th>
                <th>Sub Grupo</th>
                <th class="acao">Editar</th>
                <th class="acao">Excluir</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $linha): ?>
                <tr>
                    <td><?php echo $linha['CatCodigo'] ?></td>
                    <td><?php echo $linha['CatNome'] ?></td>
                    <td><?php echo $linha['CatGrupo'] ?></td>
                    <td><?php echo $linha['CatSubGrupo'] ?></td>
                    <td><a href="categorias-editar.php?codigo=<?php echo $linha['CatCodigo'] ?>" class="btn btn-info">Editar</a></td>
                    <td><a href="categorias-excluir-post.php?codigo=<?php echo $linha['CatCodigo'] ?>" class="btn btn-danger">Excluir</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'rodape.php' ?>
