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
        <title>Cases de Sucesso</title>
        <link rel="icon" href="/imagens/favicon.png"/>
    </head>
    
    <body>
        <!--Navbar-->
        @include('comuns.navbar')

        <!--Subheader-->
        @include('comuns.subheader')

        <!--Conteúdo-->
        <div class="container conteudo-container">
            <br>
            <h2 style="text-align: center;">Casos de Sucesso</h2>
            <br>
            <?php
            $array = array();

            foreach ($events as $event){
                array_push($array, $event->adotante_id);
            }
            
            ?>
            @foreach($events2 as $event2)
            <?php
            $q_adocao = DB::table('adocaos')->select('*')->where('adotante_id', $event2->id)->count();
            $q_adocaogrupo = DB::table('adocaogrupos')->select('*')->where('adotante_id', $event2->id)->count();
            $q_total = $q_adocao + $q_adocaogrupo;

            if ($q_total > 0) { 
            ?>
            <div class="container conteudo-container-interno">
                <h3 style="color: #fff;">Família {{$event2->sobrenome}} (adotante {{$event2->nome}} {{$event2->sobrenome}})</h3>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                
                    @foreach($events as $event)
                    <?php
                    if ($event2->id == $event->adotante_id){
                    ?>
                    <div class="col">
                        <div class="card custom-card" style="width: 18rem;">
                            <img class="card-img-top" src="{{$event->file_path}}" onerror="this.src='{!! asset('/imagens/adocao.jpg') !!}'">
                            <div class="card-body">
                                <h5 class="card-title">Adoção do(a) {{$event->adotada}}</h5>
                                <hr>
                                <p class="card-text">
                                    <strong>Motivação de {{$event->adotante}}, que adotou {{$event->adotada}} em {{$event->data}}:</strong>
                                    <br>
                                    "{{$event->motivacao}}"
                                    <br><br>
                                    <strong>Depoimento da experiência de {{$event->adotante}}:</strong>
                                    <br>
                                    <?php
                                    if ($event->depoimento == null){
                                    ?>
                                    <em>Não há depoimento até o momento.</em>
                                    <?php
                                    }
                                    else{
                                    ?>
                                    <em>"{{$event->depoimento}}"</em>
                                    <?php
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                
                    <?php
                    }
                    ?>
                    @endforeach
                    
                    @foreach($events3 as $event3)
                    <?php
                    if ($event2->id == $event3->adotante_id){
                    ?>
                    <div class="col">
                        <div class="card custom-card" style="width: 18rem;">
                            <img class="card-img-top" src="{{$event3->file_path}}" onerror="this.src='{!! asset('/imagens/adocao.jpg') !!}'">
                            <div class="card-body">
                                    @foreach($events4 as $event4)
                                    <?php
                                    if ($event3->familia_id == $event4->id){
                                    ?>
                                    <h5 class="card-title">Adoção de {{$event4->nomes}}</h5>
                                    <?php
                                    }
                                    ?>
                                    @endforeach
                                
                                <hr>
                                <p class="card-text">
                                    @foreach($events4 as $event4)
                                    <?php
                                    if ($event3->familia_id == $event4->id){
                                    ?>
                                    <strong>Motivação de {{$event3->adotante}}, que adotou {{$event4->nomes}} em {{$event3->data}}:</strong>
                                    <?php
                                    }
                                    ?>
                                    @endforeach
                                    <br>
                                    "{{$event3->motivacao}}"
                                    <br><br>
                                    <strong>Depoimento da experiência de {{$event3->adotante}}:</strong>
                                    <br>
                                    <?php
                                    if ($event3->depoimento == null){
                                    ?>
                                    <em>Não há depoimento até o momento.</em>
                                    <?php
                                    }
                                    else{
                                    ?>
                                    <em>"{{$event3->depoimento}}"</em>
                                    <?php
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                
                    <?php
                    }
                    ?>
                    
                    @endforeach
                   
                </div>
            </div>
            <?php
            }     
            ?>
            @endforeach
        </div>
    </body>
</html>



