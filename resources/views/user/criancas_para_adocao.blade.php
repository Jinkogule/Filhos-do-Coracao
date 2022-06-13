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
        
        <div class="container-fluid conteudo-container">
            <nav class="page">     
                <h3>Crianças para Adoção</h3>
            </nav>
            
            <br>
            <?php
            $status_fila = DB::table('filas')->select('*')->where('adotante_id', session('id'))->count();

            if ($status_fila == 0) { 
            ?>
            <span">Não há crianças do perfil que procura? Entre na fila de espera para ser notificado quando ela for registrada no site.</span>
            <a class="btn btn-success" style="text-align:center;" href="/" role="button" data-bs-toggle="modal" data-bs-target="#fila-de-espera">Entrar na fila de espera</a>
            <br>
            <?php
            }
            if ($status_fila == 1) { 
            ?>
            <span">Você está na fila de espera e será notificado por e-mail quando uma criança do perfil que selecionou for registrada no site.</span>
            <br>
            <?php
            }
            ?>
            <div class="modal fade" id="fila-de-espera" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content confirmacao-bloco">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Fila de Espera</h5>
                            
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <span style="text-align: center;">Selecione o perfil da criança que deseja adotar:</span>
                            <form action="{{ route('entrarFila') }}" method="POST">
                                @csrf
                                <input type="hidden" id="adotante_id" name="adotante_id" value="{{ session('id') }}">
                                <input type="hidden" id="adotante_email" name="adotante_email" value="{{ session('user_email') }}">
                                <div class="row mb-2">
                                    <div class="col">
                                        <label for="crianca_sexo" style="color: #fff">Sexo da criança que deseja adotar:</label>
                                        <select class="form-control" id="crianca_sexo" name="crianca_sexo" value="{{ old('crianca_sexo') }}" required autofocus>
                                            <option></option>
                                            <option>Masculino</option>
                                            <option>Feminino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="crianca_idade" style="color: #fff">Idade da criança que deseja adotar:</label>
                                    <input type="number" placeholder="" id="crianca_idade" class="form-control" name="crianca_idade" value="{{ old('crianca_idade') }}" required autofocus>
                                    @if ($errors->has('crianca_idade'))
                                    <span class="text-danger">{{ $errors->first('idade') }}</span>
                                    @endif
                                </div>
                                
                                <div class="row">
                                    <div class="d-grid mx-auto mb-4">
                                        <button type="submit" class="btn btn-success btn-block">Confirmar</button>
                                    </div>
                                </div>       
                            </form>
                        </div>     
                    </div>
                </div>
            </div>
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
                            {{$event->nome}}, {{$event->idade}} anos de idade.
                        </div>
                    </div>
                    <br>
                    <div class="row invisivel-mobile">
                        <a href="/crianca/{{$event->nome}}/{{$event->id}}" class="btn btn-primary" type="submit">Mais informações</a>
                    </div>

                    <div class="row invisivel-desktop">
                        <div class="col-3">
                            <img src="{{$event->file_path}}" class="border" style="width: 80px; height: 80px;" alt="">
                        </div>
                        <div class="col-9">
                            <span>
                                {{$event->nome}}, {{$event->idade}} anos de idade.
                            </span>
                        </div>
                    </div>
                    <br>
                    <div class="row invisivel-desktop">
                        <a href="/crianca/{{$event->nome}}/{{$event->id}}" class="btn btn-primary" type="submit">Mais informações</a>
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