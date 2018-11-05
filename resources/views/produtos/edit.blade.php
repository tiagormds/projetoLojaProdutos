@extends('layout.app')
@section('title', 'Editar Produto')
@section('content')
    <h1>Editar Produto: {{$produto->titulo}}</h1>
    <form action="{{ route('produtos.update', $id) }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        @include('produtos._form')
        <br />
        <button type="submit" class="btn btn-primary">Atualizar Produto</button>
    </form>
@endsection