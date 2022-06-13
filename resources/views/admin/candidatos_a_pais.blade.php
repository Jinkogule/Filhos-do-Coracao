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
        <title>Candidatos a Pais</title>
        <link rel="icon" href="/imagens/favicon.png"/>
    </head>
    
    <body>
        <!--Navbar-->
        @include('admin.navbar')

        <!--Subheader-->
        @include('comuns.subheader')

        <!--Conteúdo-->
        <div class="container conteudo-container">  
            <h2 style="text-align: center;">Candidatos a Pais</h2>
            
            <!--Resultados que estão no título-->
            @foreach($events as $event)
            <?php
            if ($event->user_type != "Administrator") { 
            ?>
                @foreach($events as $event2)
                <?php
                $quantidade = DB::table('adocaos')->select('*')->where('adotante_id', $event->id)->count();
                $quantidade_sucesso = DB::table('adocaos')->select('*')->where('adotante_id', $event->id)->where('status', 'Concluída com sucesso')->count();
                ?>
                @endforeach
                <hr>
                <h3>{{$event->nome}} {{$event->sobrenome}}</h3>
                <strong>Quantidade de tentativas de adoção realizadas:</strong> {{$quantidade}}
                <br>
                <br>
                <strong>Quantidade de adoções bem-sucedidas:</strong> {{$quantidade_sucesso}}
                <br>
                <br>
                <strong>Data de nascimento:</strong> {{$event->data_nascimento}}
                <br>
                <br>
                <strong>Gênero:</strong> {{$event->genero}}
                <br>
                <br>
                <strong>E-mail:</strong> {{$event->email}}
            <?php
            }
            ?>
            @endforeach
        </div>            
    </body>
</html>
