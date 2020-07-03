<?php require_once 'global.php' ?>
<?php

    try {
        $fornecedor = new Fornecedor();
        $lista = $fornecedor->listar();
    } catch(Exception $e) {
        Erro::trataErro($e);
    }

?>

<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Fornecedores</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="fornecedores-cadastrar.php" class="btn btn-info btn-block">Cadastrar Novo Fornecedor</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
            <tr>
                <th>Codigo</th>
                <th>Nome</th>
                <th>Fantasia</th>
                <th>CNPJ</th>
                <th>Endereço</th>
                <th>Fone</th>
                <th class="acao">Editar</th>
                <th class="acao">Excluir</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $linha): ?>
                <tr>
                    <td><?php echo $linha['ForCodigo'] ?></td>
                    <td><?php echo $linha['ForNome'] ?></td>
                    <td><?php echo $linha['ForFantasia'] ?></td>                    
                    <td><?php echo $linha['ForCNPJ'] ?></td>
                    <td><?php echo $linha['ForEndereco'] ?></td>
                    <td><?php echo $linha['ForFone'] ?></td>
                    <td><a href="fornecedores-editar.php?codigo=<?php echo $linha['ForCodigo'] ?>" class="btn btn-info">Editar</a></td>
                    <td><a href="fornecedores-excluir-post.php?codigo=<?php echo $linha['ForCodigo'] ?>" class="btn btn-danger">Excluir</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'rodape.php' ?>
