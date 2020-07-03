<?php require_once 'cabecalho.php' ?>

<div class="row">
    <div class="col-md-12">
        <h2>Cadastrar Novo Cliente</h2>
    </div>
</div>

<form action="clientes-cadastrar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input name="nome" type="text" class="form-control" placeholder="Nome" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input name="cpf" type="text" class="form-control" placeholder="CPF" required>
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
                <label for="bairro">Bairro</label>
                <input name="bairro" type="text" class="form-control" placeholder="Bairro" required>
            </div>            
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
