@extends('layout.app')
@section('title', 'Lista de Produtos')
@section('content')

    <div class="col-md-12">
        <h1 class="col-md-10">Produtos</h1>
        <h3><a class="col-md-2" href="{{ route('login.sair') }}">Sair</a></h3>
    </div>
    <div class="row">
        @foreach($produtos as $produto)
            <div class="col-md-3">
                @if(file_exists("./img/produtos/".md5($produto->id).".jpg"))
                        <img src="{{ asset('img/produtos/'.md5($produto->id).'.jpg') }}" alt="Imagem Produto" class="img-fluid img-thumbnail">
                @endif
                <h4 class="text-center"><a href="{{ route('produtos.show', $produto->id) }}">{{ $produto->titulo }}</a></h4>
                <div class="mb-3">
                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <a class="btn btn-sm btn-primary" href="{{ route('produtos.edit', $produto->id) }}">Editar</a>
                        {{--<a class="btn btn-sm btn-danger" href="{{ route('produtos.destroy', $produto->id) }}">Excluir</a>--}}
                        <buttom class="btn btn-sm btn-danger">Excluir</buttom>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection