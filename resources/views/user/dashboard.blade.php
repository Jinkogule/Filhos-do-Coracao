<!doctype html>
<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        @include('comuns.bootstrap')

        <!-- Estilos (path do arquivo css) -->
        <link rel="stylesheet" href="/css/home.css">

        <!-- Título e Favicon -->
        <title>Home - Usuário</title>
        <link rel="icon" href=""/>
    </head>
    
    <body>
        @include('user.navbar')

        @if(session()->has('message'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('message') }}
            </div>
        @endif
        
        <!--Subheader-->
        @include('comuns.subheader')

        <!--Conteúdo-->
        <div class="container conteudo-container">
            <a class="btn btn-primary" href="/criancas-para-adocao" role="button">Visualizar crianças disponíveis para adoção</a>
            <br>
            <br>
            <a class="btn btn-primary" href="/familias-para-adocao" role="button">Visualizar famílias disponíveis para adoção</a>
            <br>
            <br>
            <a class="btn btn-primary" href="/minhas-adocoes" role="button">Minhas Adoções</a>
            
        </div>

    </body>
</html>

