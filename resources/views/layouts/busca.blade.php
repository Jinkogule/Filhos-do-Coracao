<!doctype html>
<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Bootstrap CSS-->
        @include('comuns.bootstrap')

        <!-- Estilos (path do arquivo css) -->
        <link rel="stylesheet" href="/css/home.css">

        <!-- Título e Favicon -->
        <title>Resultado(s) da busca: "{{ $busca }}"</title>
    </head>
    
    <body>
        <!--Navbar-->
        @include('comuns.navbar')
       
        <!--Subheader-->
        @include('comuns.subheader')

        <!--Conteúdo da Busca-->
        <div class="container conteudo-container">
            <nav class="page">     
                <h3 style="color: #fff; text-align: center;">Resultado(s) da busca: "{{ $busca }}"<h3>
            </nav>
            <div class="row">
                    
                    <!--Resultados que estão no texto, mas não entre as palavras chave-->
                    @foreach($events as $event)

                    <?php
                    $texto = $event->texto;
                    
                    if (str_contains($texto, $busca)) { 
                    ?>
                    <div class="container" style="margin-bottom: 10px;">
                        <a class="titulo-resultado" href="{{$event->link}}" style="color: #fff;">{{$event->titulo}}</a>
                        <div class="row">
                            <div class="col-1">
                                <img src="/imagens/favicon.png" class="border" style="width: 80px; height: 80px;" alt="">
                            </div>
                            <div class="col-11">
                                <span>Neste link há informações sobre sua busca: "{{ $busca }}"</span>
                                <br>
                                <span>Palavras-chave envolvidas: "{{$event->palavras_chave}}"</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <?php
                    }
                    ?>
                    @endforeach
            </div>
        </div>
    </body>
</html>