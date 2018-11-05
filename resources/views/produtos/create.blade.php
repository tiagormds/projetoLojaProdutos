@extends('layout.app')
@section('title', 'Adicionar Produto')
@section('content')
    <h1>Adicionar Produto</h1>
    <form action="{{ route('produtos.store') }}" method="post">
        {{ csrf_field() }}
        @include('produtos._form')
        <br />
        <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
    </form>
@endsection