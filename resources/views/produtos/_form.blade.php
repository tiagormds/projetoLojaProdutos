<table class="table">
    <tr>
        <td><label for="sku">SKU</label></td>
        <td><input type="text" class="form-control" id="sku" name="sku" placeholder="Digite o Código do Produto..."
                   value="@if(isset($produto->sku)) {{ $produto->sku }} @endif"/></td>
    </tr>

    <tr>
        <td><label for="titulo">Título</label></td>
        <td><input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite o Nome do Produto..."
                   value="@if(isset($produto->titulo)) {{ $produto->titulo }} @endif"/></td>
    </tr>

    <tr>
        <td><label for="preco">Preço</label></td>
        <td><input type="text" step=".01" class="form-control" id="preco" name="preco" placeholder="0,00"
                   value="@if(isset($produto->preco)) {{ $produto->preco }} @endif"></td>
    </tr>

    <tr>
        <td><label for="imgProduto">Imagem</label></td>
        <td><input class="form-control-file" type="file" name="imgProduto" id="imgProduto"></td>
    </tr>

    <tr>
        <td><label for="descricao">Descrição</label></td>
        <td><textarea class="form-control" id="descricao" name="descricao" rows="3"
                      placeholder="Digite uma breve descrição do Produto...">@if(isset($produto->descricao)) {{ $produto->descricao }} @endif</textarea>
        </td>
    </tr>
</table>