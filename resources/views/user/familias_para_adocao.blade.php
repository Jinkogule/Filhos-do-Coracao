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
        <title>Famílias para Adoção</title>
    </head>
    
    <body>
        <!--Navbar-->
        @include('user.navbar')
       
        <!--Subheader-->
        @include('comuns.subheader')
        
        <div class="container-fluid conteudo-container">
            <nav class="page">     
                <h3>Famílias para Adoção</h3>
            </nav>
            <div class="row">
                <!--Resultados que estão no título-->
                @foreach($events as $event)
                <?php
                if ($event->status == 'Esperando adoção'){
                ?>
                <hr>
                <div class="container" style="margin-bottom: 10px;">
                    <a class="titulo-resultado" href=""></a>
                    <div class="row invisivel-mobile">
                        <div class="col-1">
                            <img src="{{$event->file_path}}" class="border" style="width: 80px; height: 80px;" alt="">
                        </div>
                        <div class="col-11">
                            {{$event->nomes}}, {{$event->idades}}, respectivamente.
                        </div>
                    </div>
                    <br>
                    <div class="row invisivel-mobile">
                        <a href="/familia/{{$event->id}}" class="btn btn-primary" type="submit">Mais informações</a>
                    </div>

                    <div class="row invisivel-desktop">
                        <div class="col-3">
                            <img src="{{$event->file_path}}" class="border" style="width: 80px; height: 80px;" alt="">
                        </div>
                        <div class="col-9">
                            <span>
                                {{$event->nomes}}, {{$event->idades}}, respectivamente.
                            </span>
                        </div>
                    </div>
                    <br>
                    <div class="row invisivel-desktop">
                        <a href="/familia/{{$event->id}}" class="btn btn-primary" type="submit">Mais informações</a>
                    </div>
                </div>
                <?php
                }
                ?>
                @endforeach
            </div>
        </div>
        
    </body>
</html>