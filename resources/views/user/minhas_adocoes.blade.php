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
        <title>Minhas Adoções</title>
        <link rel="icon" href="/imagens/favicon.png"/>
    </head>
    
    <body>
        <!--Navbar-->
        @include('user.navbar')

        <!--Subheader-->
        @include('comuns.subheader')

        <!--Conteúdo-->
        
        <div class="container conteudo-container">
            <br>
            <h2 style="text-align:center;">Minhas Adoções de Crianças</h2>
            <br>
            <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($events as $event)
                <div class="col">
                    <div class="card custom-card" style="width: 18rem;">
                        @foreach($events2 as $event2)
                        <?php
                        if ($event2->id == $event->adotada_id){
                        ?>
                        <img class="card-img-top" src="{{$event2->file_path}}" alt="/imagens/adocao.jpg">
                        <?php
                        }
                        ?>
                        @endforeach
                        <div class="card-body">
                            <h5 class="card-title">{{$event->adotada}}</h5>
                            <hr>
                            <p class="card-text">
                                <strong>Status da adoção:</strong> {{$event->status}}
                                <br>
                                "{{$event->motivacao}}"
                            </p>
                        </div>
                        
                        <?php
                        if ($event->status == "Pendente"){
                        ?>
                        <div class="card-footer">
                            <!--Form Cancelamento de solicitação de Adoção-->
                            <form action="{{ route('cancelarSolicitacaoDeAdocao') }}" method="POST">
                                @csrf
                                <input type="hidden" id="adocao_id" name="adocao_id" value="{{$event->id}}">
                                <input type="hidden" id="adotada_id" name="adotada_id" value="{{$event->adotada_id}}">
                                
                                <div class="row">
                                    <div class="d-grid mx-auto mb-4">
                                        <button type="submit" class="btn btn-danger btn-block">Cancelar solicitação de adoção</button>
                                    </div>
                                </div>  
                        
                            </form>
                        </div>
                        <?php
                        }
                        ?>
                        <?php
                        if ($event->status == "Em estágio inicial"){
                        ?>
                        <div class="card-footer">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bem-sucedida">
                            Adoção bem-sucedida
                            </button>
                            <br><br>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#malsucedida">
                            Adoção malsucedida
                            </button>

                            <!-- Modal Bem-sucedida-->
                            <div class="modal fade" id="bem-sucedida" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content confirmacao-bloco">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Adoção Bem-sucedida</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('AdocaoBemSucedida') }}" method="POST">
                                                @csrf
                                                <label for="depoimento" style="color: #fff">Descreva brevemente um depoimento sobre sua experiência até o momento:</label>
                                                <input type="text" placeholder="" id="depoimento" class="form-control" name="depoimento" required autofocus>
                                                <input type="hidden" id="adotante_id" name="adotante_id" value="{{ session('id') }}">
                                                <input type="hidden" id="adocao_id" name="adocao_id" value="{{$event->id}}">
                                                <input type="hidden" id="adotada_id" name="adotada_id" value="{{$event->adotada_id}}">
                                                <input type="hidden" id="status" name="status" value="Concluída com sucesso">
                                                
                                                <div class="modal-footer" style="text-align: center;">
                                                    <button type="submit" class="btn btn-success btn-block">Confirmar</button>
                                                </div>
                                    
                                            </form>
                                            
                                        </div>
                                
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Malsucedida-->
                            <div class="modal fade" id="malsucedida" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content confirmacao-bloco">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Adoção Malsucedida</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('AdocaoMalSucedida') }}" method="POST">
                                                @csrf
                                                <label for="depoimento" style="color: #fff">Descreva brevemente o que o levou a não prosseguir com a adoção:</label>
                                                <input type="text" placeholder="" id="depoimento" class="form-control" name="depoimento" required autofocus>
                                                <input type="hidden" id="adotante_id" name="adotante_id" value="{{ session('id') }}">
                                                <input type="hidden" id="adocao_id" name="adocao_id" value="{{$event->id}}">
                                                <input type="hidden" id="adotada_id" name="adotada_id" value="{{$event->adotada_id}}">
                                                <input type="hidden" id="status" name="status" value="Adoção malsucedida">
                                                
                                                <div class="modal-footer" style="text-align: center;">
                                                    <button type="submit" class="btn btn-success btn-block">Confirmar</button>
                                                </div>
                                    
                                            </form>
                                            
                                        </div>
                                
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <?php
                        if ($event->status == "Concluída com sucesso" && $event->file_path == null){
                        ?>
                        <form action="{{ route('registrarFotoDaFamilia') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="adocao_id" name="adocao_id" value="{{$event->id}}">
                            <div class="form-group mb-4">
                                <label for="image" style="color: #fff">Envie-nos uma foto da família reunida:</label>
                                <input type="file" id="image" name="image" required>
                            </div>
                            <div class="row">
                                <div class="d-grid mx-auto mb-4">
                                    <button type="submit" class="btn btn-success btn-block">Enviar</button>
                                </div>
                            </div>       
                        </form>
                        <?php
                        }
                        ?>  
                    </div>
                </div>

            @endforeach
            </div>
            <hr>
            <h2 style="text-align:center;">Minhas Adoções de Famílias</h2>
            <br>
            <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($events3 as $event3)
                <div class="col">
                    <div class="card custom-card" style="width: 18rem;">
                        @foreach($events4 as $event4)
                        <?php
                        if ($event4->id == $event3->familia_id){
                        ?>
                        <img class="card-img-top" src="{{$event4->file_path}}" alt="/imagens/adocao.jpg">
                        <?php
                        }
                        ?>
                        @endforeach
                        <div class="card-body">
                            <h5 class="card-title">{{$event4->nomes}}</h5>
                            <hr>
                            <p class="card-text">
                                <strong>Status da adoção:</strong> {{$event3->status}}
                                <br>
                                "{{$event3->motivacao}}"
                            </p>
                        </div>
                        
                        <?php
                        if ($event3->status == "Pendente"){
                        ?>
                        <div class="card-footer">
                            <!--Form Cancelamento de solicitação de Adoção-->
                            <form action="{{ route('cancelarSolicitacaoDeAdocaoGrupo') }}" method="POST">
                                @csrf
                                <input type="hidden" id="adocao_id" name="adocao_id" value="{{$event3->id}}">
                                <input type="hidden" id="familia_id" name="familia_id" value="{{$event3->familia_id}}">
                                
                                <div class="row">
                                    <div class="d-grid mx-auto mb-4">
                                        <button type="submit" class="btn btn-danger btn-block">Cancelar solicitação de adoção</button>
                                    </div>
                                </div>  
                        
                            </form>
                        </div>
                        <?php
                        }
                        ?>
                        <?php
                        if ($event3->status == "Em estágio inicial"){
                        ?>
                        <div class="card-footer">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bem-sucedida">
                            Adoção bem-sucedida
                            </button>
                            <br><br>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#malsucedida">
                            Adoção malsucedida
                            </button>

                            <!-- Modal Bem-sucedida-->
                            <div class="modal fade" id="bem-sucedida" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content confirmacao-bloco">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Adoção Bem-sucedida</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('AdocaoBemSucedidaGrupo') }}" method="POST">
                                                @csrf
                                                <label for="depoimento" style="color: #fff">Descreva brevemente um depoimento sobre sua experiência até o momento:</label>
                                                <input type="text" placeholder="" id="depoimento" class="form-control" name="depoimento" required autofocus>
                                                <input type="hidden" id="adotante_id" name="adotante_id" value="{{ session('id') }}">
                                                <input type="hidden" id="adocao_id" name="adocao_id" value="{{$event3->id}}">
                                                <input type="hidden" id="familia_id" name="familia_id" value="{{$event3->familia_id}}">
                                                <input type="hidden" id="status" name="status" value="Concluída com sucesso">
                                                
                                                <div class="modal-footer" style="text-align: center;">
                                                    <button type="submit" class="btn btn-success btn-block">Confirmar</button>
                                                </div>
                                    
                                            </form>
                                            
                                        </div>
                                
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Malsucedida-->
                            <div class="modal fade" id="malsucedida" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content confirmacao-bloco">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Adoção Malsucedida</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('AdocaoMalSucedidaGrupo') }}" method="POST">
                                                @csrf
                                                <label for="depoimento" style="color: #fff">Descreva brevemente o que o levou a não prosseguir com a adoção:</label>
                                                <input type="text" placeholder="" id="depoimento" class="form-control" name="depoimento" required autofocus>
                                                <input type="hidden" id="adotante_id" name="adotante_id" value="{{ session('id') }}">
                                                <input type="hidden" id="adocao_id" name="adocao_id" value="{{$event3->id}}">
                                                <input type="hidden" id="familia_id" name="familia_id" value="{{$event3->familia_id}}">
                                                <input type="hidden" id="status" name="status" value="Adoção malsucedida">
                                                
                                                <div class="modal-footer" style="text-align: center;">
                                                    <button type="submit" class="btn btn-success btn-block">Confirmar</button>
                                                </div>
                                    
                                            </form>
                                            
                                        </div>
                                
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <?php
                        if ($event3->status == "Concluída com sucesso" && $event3->file_path == null){
                        ?>
                        <form action="{{ route('registrarFotoDaFamiliaGrupo') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="adocao_id" name="adocao_id" value="{{$event3->id}}">
                            <div class="form-group mb-4">
                                <label for="image" style="color: #fff">Envie-nos uma foto da família reunida:</label>
                                <input type="file" id="image" name="image" required>
                            </div>
                            <div class="row">
                                <div class="d-grid mx-auto mb-4">
                                    <button type="submit" class="btn btn-success btn-block">Enviar</button>
                                </div>
                            </div>       
                        </form>
                        <?php
                        }
                        ?>  
                    </div>
                </div>

            @endforeach
            </div>
        </div>
    </body>
</html>
