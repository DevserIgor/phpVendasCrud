<?php require_once 'global.php' ?>
<?php
    try {
        $cliente = new Cliente();
        $listaCliente = $cliente->listar();
    } catch(Exception $e) {
        Erro::trataErro($e);
    }

    try {
        $produto = new Produto();
        $listaProduto = $produto->listar();
    } catch(Exception $e) {
        Erro::trataErro($e);
    }

?>

<?php require_once 'cabecalho.php' ?>

<div class="row">
    <div class="col-md-12">
        <h2>Venda</h2>
    </div>
</div>

<form action="vendas-cadastrar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">            
            <div class="form-group">
                <label for="cliente">Cliente</label>
                <select name="cliente" id="" class="form-control" placeholder="Selecione Um Cliente" required>
                    <option value="">Selecione Um Cliente</option>
                    <?php foreach ($listaCliente as $linhaCliente): ?>
                        <option value="<?php echo $linhaCliente['CliCodigo'] ?>"><?php echo $linhaCliente['CliNome'] ?></option>
                    </tr>
                    <?php endforeach ?>
                </select>                
            </div>
            
            <div class="form-group">
                <label for="produtos">Produtos</label>
                <select  id="produto" class="form-control" placeholder="Selecione Um Produto" required >
                    <option value="">Selecione Um Produto</option>
                    <?php foreach ($listaProduto as $linhaProduto): ?>
                        <option value="<?php echo $linhaProduto['ProCodigo'] ?>"><?php echo $linhaProduto['ProDescricao'] ?></option>
                    </tr>
                    <?php endforeach ?>
                </select>                
            </div>

            <div class="form-group px-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Qtd</th>
                            <th>Subtotal</th>                                                
                            <th class="acao">Excluir</th>
                        </tr>
                    </thead>
                    <tfoot> 
                        <tr>
                            <td colspan="4" class="right">Total</td>
                            <td colspan="1" class="right" id='total'>0,00</td>                            
                        </tr>
                    </tfoot>
                    <tbody id="produtos-grid">                                                
                    </tbody>
                </table>
            </div>
            
            <div class="col-md-6 pl-0">
                <div class="form-group">
                    <label for="desconto">Desconto</label>
                    <input name="desconto" type="text" id="desconto" onkeyup="calculaValorTotal();" required pattern="^\d*(\.\d{0,2})?$" class="form-control" placeholder="0,00">
                </div>
            </div>

            <div class="col-md-6 pr-0">     
                <div class="form-group">
                    <label for="frete">Frete</label>
                    <input name="frete" type="text" id="frete" onkeyup="calculaValorTotal();" required pattern="^\d*(\.\d{0,2})?$" class="form-control" placeholder="0,00">
                </div>
            </div>     
            
            <input type="hidden" name="total" id='input-total' value="">
            <input type="submit" class="btn btn-success btn-block" value="Salvar">            
        </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script type="text/javascript" src="assets\js\main.js"></script>
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
