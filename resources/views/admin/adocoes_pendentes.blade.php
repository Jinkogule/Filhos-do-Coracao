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
        <title>Adoções Pendentes</title>
        <link rel="icon" href="/imagens/favicon.png"/>
    </head>
    
    <body>
        <!--Navbar-->
        @include('admin.navbar')

        <!--Subheader-->
        @include('comuns.subheader')

        <!--Conteúdo-->
        <div class="container conteudo-container">
            <br>
            <h2 style="text-align: center;">Adoções de Crianças Pendentes</h2>
            <br>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($events as $event)
                    @foreach($events as $event2)
                    <?php
                    $quantidade = DB::table('adocaos')->select('*')->where('adotante_id', $event->adotante_id)->count();
                    $quantidade_sucesso = DB::table('adocaos')->select('*')->where('adotante_id', $event->adotante_id)->where('status', 'Concluída com sucesso')->count();
                    ?>
                    @endforeach
                <?php
                if ($event->status == 'Pendente'){
                ?>
                <div class="col">
                    <div class="card custom-card" style="width: 18rem;">
                        <img class="card-img-top" src="/imagens/adocao.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Solicitação {{$event->id}}</h5>
                            <p class="card-text">
                                <strong>Solicitante:</strong> {{$event->adotante}}
                                <br>
                                <br>
                                <strong>Quantidade de tentativas de adoção realizadas:</strong> {{$quantidade}}
                                <br>
                                <br>
                                <strong>Quantidade de adoções bem-sucedidas:</strong> {{$quantidade_sucesso}}
                                <br>
                                <br>
                                <strong>Criança:</strong> {{$event->adotada}}
                                <br>
                                <br>
                                <strong>Motivação de {{$event->adotante}}:</strong>
                                <br>
                                "{{$event->motivacao}}"
                                <br><br>
                                <strong>Data da solicitação: {{$event->data}}</strong>
                                <br>
                            </p>

                            <!--Form Aprovação-->
                            <form action="{{ route('aprovarAdocao') }}" method="POST">
                                @csrf
                                <input type="hidden" id="adocao_id" name="adocao_id" value="{{$event->id}}">
                                <input type="hidden" id="adotada_id" name="adotada_id" value="{{$event->adotada_id}}">
                                <input type="hidden" id="adotante_email" name="adotante_email" value="{{$event->adotante_email}}">
                                <input type="hidden" id="status" name="status" value="Em estágio inicial">
                                
                                <div class="row">
                                    <div class="d-grid mx-auto mb-4">
                                        <button type="submit" class="btn btn-success btn-block">Aprovar</button>
                                    </div>
                                </div>  
                        
                            </form>
                            
                            <!--Form Cancelamento-->
                            <form action="{{ route('reprovarAdocao') }}" method="POST">
                                @csrf
                                <input type="hidden" id="adocao_id" name="adocao_id" value="{{$event->id}}">
                                <input type="hidden" id="adotada_id" name="adotada_id" value="{{$event->adotada_id}}">
                                <input type="hidden" id="adotante_email" name="adotante_email" value="{{$event->adotante_email}}">
                                <input type="hidden" id="status" name="status" value="Reprovada pelos administradores">
                                
                                <div class="row">
                                    <div class="d-grid mx-auto mb-4">
                                        <button type="submit" class="btn btn-danger btn-block">Reprovar</button>
                                    </div>
                                </div>  
                        
                            </form> 
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
                @endforeach
            </div>
            <hr>
            <h2 style="text-align: center;">Adoções de Famílias Pendentes</h2>
            <br>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($events2 as $event2)
                    @foreach($events2 as $event3)
                    <?php
                    $quantidade = DB::table('adocaogrupos')->select('*')->where('adotante_id', $event2->adotante_id)->count();
                    $quantidade_sucesso = DB::table('adocaogrupos')->select('*')->where('adotante_id', $event2->adotante_id)->where('status', 'Concluída com sucesso')->count();
                    ?>
                    @endforeach
                <?php
                if ($event2->status == 'Pendente'){
                ?>
                <div class="col">
                    <div class="card custom-card" style="width: 18rem;">
                        <img class="card-img-top" src="/imagens/adocao.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Solicitação {{$event2->id}}</h5>
                            <p class="card-text">
                                <strong>Solicitante:</strong> {{$event2->adotante}}
                                <br>
                                <br>
                                <strong>Quantidade de tentativas de adoção realizadas:</strong> {{$quantidade}}
                                <br>
                                <br>
                                <strong>Quantidade de adoções bem-sucedidas:</strong> {{$quantidade_sucesso}}
                                <br>
                                <br>
                                @foreach($events3 as $event3)
                                <?php
                                if ($event2->familia_id == $event3->id){
                                ?>
                                <strong>Criança:</strong> {{$event3->nomes}}</h5>
                                <?php
                                }
                                ?>
                                @endforeach
                                <br>
                                <br>
                                <strong>Motivação de {{$event2->adotante}}:</strong>
                                <br>
                                "{{$event2->motivacao}}"
                                <br><br>
                                <strong>Data da solicitação: {{$event2->data}}</strong>
                                <br>
                            </p>

                            <!--Form Aprovação-->
                            <form action="{{ route('aprovarAdocaoGrupo') }}" method="POST">
                                @csrf
                                <input type="hidden" id="adocao_id" name="adocao_id" value="{{$event2->id}}">
                                <input type="hidden" id="familia_id" name="familia_id" value="{{$event2->familia_id}}">
                                <input type="hidden" id="adotante_email" name="adotante_email" value="{{$event->adotante_email}}">
                                <input type="hidden" id="status" name="status" value="Em estágio inicial">
                                
                                <div class="row">
                                    <div class="d-grid mx-auto mb-4">
                                        <button type="submit" class="btn btn-success btn-block">Aprovar</button>
                                    </div>
                                </div>  
                        
                            </form>
                            
                            <!--Form Cancelamento-->
                            <form action="{{ route('reprovarAdocaoGrupo') }}" method="POST">
                                @csrf
                                <input type="hidden" id="adocao_id" name="adocao_id" value="{{$event2->id}}">
                                <input type="hidden" id="familia_id" name="familia_id" value="{{$event2->familia_id}}">
                                <input type="hidden" id="adotante_email" name="adotante_email" value="{{$event->adotante_email}}">
                                <input type="hidden" id="status" name="status" value="Reprovada pelos administradores">
                                
                                <div class="row">
                                    <div class="d-grid mx-auto mb-4">
                                        <button type="submit" class="btn btn-danger btn-block">Reprovar</button>
                                    </div>
                                </div>  
                        
                            </form> 
                        </div>
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
