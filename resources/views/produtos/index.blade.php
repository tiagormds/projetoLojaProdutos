@extends('layout.app')
@section('title', 'Lista de Produtos')
@section('content')



    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('produtos.buscar') }}" method="get">
                {{--{{ csrf_field() }}--}}
                <div class="col-md-10">
                    <input type="text" class="form-control" id="busca" name="busca" value="@if(isset($buscar)) {{ $buscar }} @endif" placeholder="Procurar produtos no site..."/>
                </div>
                <div class="col-md-2" style="float: right">
                    <button class="btn btn-outline-secondary" >Buscar</button>
                </div>
            </form>
        </div>
    </div>
    <br />
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
    {{ $produtos->links() }}
@endsection