@extends('layout.app')
@section('title', $produto->titulo)
@section('content')
<h1>Produtos - {{ $produto->titulo }}</h1>

<div class="row">
    @if(file_exists("./img/produtos/".md5($produto->id).".jpg"))
    <div class="col-md-6">
        <img src="{{ asset('img/produtos/'.md5($produto->id).'.jpg') }}" alt="Imagem Produto" class="img-fluid img-thumbnail">
    </div>
    @endif
    <div class="col-md-6">
        <ul>
            <li><strong>SKU: </strong> {{ $produto->sku }}</li>
            <li><strong>Preço: </strong> {{ $produto->preco }}</li>
            <li><strong>Adicionado em: </strong>@if(isset($produto->created_at)) {{ date_format($produto->created_at, "d/m/Y") }} @endif</li>
        </ul>
    </div>
</div>

<p>{{ $produto->descricao }}</p>
<a href="javascript:history.go(-1)">Voltar</a>
@endsection