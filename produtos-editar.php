<?php require_once 'global.php' ?>
<?php
    try {
        $codigo = $_GET['codigo'];
        $produto = new Produto($codigo);
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
    try {
        $fornecedor = new Fornecedor();
        $listaFornecedor = $fornecedor->listar();
    } catch(Exception $e) {
        Erro::trataErro($e);
    }

    try {
        $categoria = new Categoria();
        $listaCategoria = $categoria->listar();
    } catch(Exception $e) {
        Erro::trataErro($e);
    }
?>
<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Produto</h2>
    </div>
</div>
<form action="produtos-editar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="descricao">Decrição</label>
                <input type="hidden" name="codigo" value="<?php echo $produto->codigo ?>">
                <input name="descricao" type="text" value="<?php echo $produto->descricao ?>" class="form-control" placeholder="Decrição">
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select name="categoria" id="" class="form-control" placeholder="Selecione Uma Categoria">
                    <option value="">Selecione Uma Categoria</option>
                    <?php foreach ($listaCategoria as $linhaCategoria): ?>
                        <option value="<?php echo $linhaCategoria['CatCodigo'] ?>" <?php if($produto->catCodigo == $linhaCategoria['CatCodigo'] ):?>Selected<?php endif ?>  ><?php echo $linhaCategoria['CatNome'] ?></option>
                    </tr>
                    <?php endforeach ?>
                </select>                
            </div>
            <div class="form-group">
                <label for="fornecedor">Fornecedor</label>
                <select name="fornecedor" id="" class="form-control" placeholder="Selecione Um Fornecedor">
                    <option value="">Selecione Um Fornecedor</option>
                    <?php foreach ($listaFornecedor as $linhaFornecedor): ?>
                        <option value="<?php echo $linhaFornecedor['ForCodigo']?>"  <?php if($produto->forCodigo == $linhaFornecedor['ForCodigo'] ):?>Selected<?php endif ?>  ><?php echo $linhaFornecedor['ForNome'] ?></option>
                    </tr>
                    <?php endforeach ?>
                </select>                
            </div>
            <div class="form-group">
                <label for="precoVenda">Preço de Venda</label>
                <input name="precoVenda" type="text" value="<?php echo number_format($produto->precoVenda, 2, '.', '') ?>" pattern="^\d*(\.\d{0,2})?$" class="form-control" placeholder="0,00">
            </div>            
            <div class="form-group">
                <label for="margemLucro">Margem de Lucro</label>
                <input name="margemLucro" type="text" value="<?php echo $produto->margemLucro ?>" pattern="^\d*(\.\d{0,2})?$" class="form-control" placeholder="0,00">
            </div>            
            <div class="form-group">
                <label for="estoque">Estoque</label>
                <input name="estoque" type="text" value="<?php echo $produto->estoque ?>" pattern="^\d*(d{0})?$" class="form-control" placeholder="Qtd">
            </div>            

            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
    $(document).on('keydown', 'input[pattern]', function(e){
    var input = $(this);
    var oldVal = input.val();
    var regex = new RegExp(input.attr('pattern'), 'g');

    setTimeout(function(){
        var newVal = input.val();
        if(!regex.test(newVal)){
        input.val(oldVal); 
        }
    }, 0);
    });

</script>
<?php require_once 'rodape.php' ?>
