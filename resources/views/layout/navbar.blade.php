<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand">Produtos</a></div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('produtos.index') }}">Página Inicial</a></li>
                <li><a href="{{ route('produtos.create') }}">Adicionar Produtos</a></li>
            </ul>
            <ul class="navbar-nav mr-auto" style="float: right">
                <li><a class="botaoSair" href="{{ route('login.sair') }}">Sair</a></li>
            </ul>
        </div>
    </div>
</nav>