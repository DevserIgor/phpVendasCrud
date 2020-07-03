<?php require_once 'cabecalho.php' ?>

<div class="row">
    <div class="col-md-12">
        <h2>Cadastrar Novo Fornecedor</h2>
    </div>
</div>

<form action="fornecedores-cadastrar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input name="nome" type="text" class="form-control" placeholder="Nome" required>
            </div>
            <div class="form-group">
                <label for="fantasia">Fantasia</label>
                <input name="fantasia" type="text" class="form-control" placeholder="Fantasia" required>
            </div>
            <div class="form-group">
                <label for="cnpj">CNPJ</label>
                <input name="cnpj" type="text" class="form-control" placeholder="CNPJ" required>
            </div>            
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input name="endereco" type="text" class="form-control" placeholder="Endereço" required>
            </div>            
            <div class="form-group">
                <label for="fone">Fone</label>
                <input name="fone" type="text" class="form-control" placeholder="fone" required>
            </div>            
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
