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
        <title>Crianças para Adoção</title>
    </head>
    
    <body>
        <!--Navbar-->
        @include('user.navbar')
       
        <!--Subheader-->
        @include('comuns.subheader')

        <!--Conteúdo da Busca-->
        
        
        <div class="container-fluid conteudo-container">
            <nav class="page">     
                <h3>Crianças para Adoção</h3>
            </nav>
            <div class="row">
                <!--Resultados que estão no título-->
                @foreach($events as $event)
                <hr>
                <div class="container" style="margin-bottom: 10px;">
                    <a class="titulo-resultado" href=""></a>
                    <div class="row invisivel-mobile">
                        <div class="col-1">
                            <img src="{{$event->file_path}}" class="border" style="width: 80px; height: 80px;" alt="">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmacao">
                            Adotar
                            </button>
                        </div>
                        <div class="col-11">
                            <span>
                                <strong>Nome:</strong> {{$event->nome}}
                                <br>
                                <br>
                                <strong>Idade:</strong> {{$event->idade}} anos.
                                <br>
                                <br>
                                <strong>Descrição:</strong> {{$event->descricao}}
                                <br>
                                <br>
                                <strong>Localizado em:</strong> {{$event->localizacao}}
                                <br>
                                <br>
                                <strong>Estado de saúde:</strong> {{$event->estado_de_saude}} 
                            </span>
                        </div>
                        <br>
                    </div>
                    

                    <div class="row invisivel-desktop">
                        <div class="col-3">
                            <img src="{{$event->file_path}}" class="border" style="width: 80px; height: 80px;" alt="">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmacao">
                            Adotar
                            </button>
                        </div>
                        <div class="col-9">
                            <span>
                                <strong>Nome:</strong> {{$event->nome}}
                                <br>
                                <br>
                                <strong>Idade:</strong> {{$event->idade}} anos.
                                <br>
                                <br>
                                <strong>Descrição:</strong> {{$event->descricao}}
                                <br>
                                <br>
                                <strong>Localizado em:</strong> {{$event->localizacao}}
                                <br>
                                <br>
                                <strong>Estado de saúde:</strong> {{$event->estado_de_saude}}    
                            </span>
                            
                        </div>
                        <br>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="confirmacao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content confirmacao-bloco">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Confirmação de Adoção</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    
                                    <form id="registro_de_adocao" action="{{ route('registrarAdocao') }}" method="POST">
                                        @csrf
                                        <label for="motiovacao" style="color: #fff">Descreva brevemente o que te motiva a adotar uma criança:</label>
                                        <input type="text" placeholder="Descreva sua motivação" id="motivacao" class="form-control" name="motivacao" required autofocus>
                                        <input type="hidden" id="adotante" name="adotante" value="{{ session('nome') }}">
                                        <input type="hidden" id="adotante_id" name="adotante_id" value="{{ session('id') }}">
                                        <input type="hidden" id="adotante_email" name="adotante_email" value="{{ session('user_email') }}">
                                        <input type="hidden" id="adotada" name="adotada" value="{{$event->nome}}">
                                        <input type="hidden" id="adotada_id" name="adotada_id" value="{{$event->id}}">
                                        <input type="hidden" id="data" name="data" value="{{ date('d/m/Y') }}">
                                        <input type="hidden" id="status" name="status" value="Pendente">

                                        <div class="modal-footer" style="text-align: center;">
                                            <button type="submit" onclick="submitForms1()" class="btn btn-success btn-block">Confirmar</button>
                                        </div>
                                    </form> 
                                </div>     
                            </div>
                        </div>
                    </div>
                    <!--Form de adoção-->
      
                </div>
                @endforeach
            </div>
        </div>
        
    </body>
</html>