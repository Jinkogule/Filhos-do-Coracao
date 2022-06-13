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
        <title>Registro de Criança</title>
        <link rel="icon" href=""/>
    </head>

    <body>
        <!--Navbar-->
        @include('comuns.navbar')

        @include('comuns.subheader')

        <div class="container container-cadastro">
            <br><h4 style="text-align: center;">Registro de Criança</h4><hr>
            <form action="{{ route('registrarCrianca') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-2">
                    <div class="col">
                        <label for="nome" style="color: #fff">Nome:</label>
                        <input type="text" placeholder="Nome da criança" id="nome" class="form-control" name="nome" value="{{ old('nome') }}" required autofocus>
                        @if ($errors->has('nome'))
                        <span class="text-danger">{{ $errors->first('nome') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="idade" style="color: #fff">Idade:</label>
                    <input type="number" placeholder="Idade da criança" id="idade" class="form-control" name="idade" value="{{ old('idade') }}" required autofocus>
                    @if ($errors->has('idade'))
                    <span class="text-danger">{{ $errors->first('idade') }}</span>
                    @endif
                </div>
                <div class="col mb-4">
                    <label for="sexo" style="color: #fff">Sexo da criança:</label>
                    <select class="form-control" id="sexo" name="sexo" value="{{ old('sexo') }}">
                        <option></option>
                        <option>Masculino</option>
                        <option>Feminino</option>
                    </select>
                </div>
                <div class="col mb-2">
                    <label for="estado_de_saude" style="color: #fff">Estado de saúde da criança:</label>
                    <input type="text" placeholder="Estado de saúde" id="estado_de_saude" class="form-control"name="estado_de_saude" value="{{ old('estado_de_saude') }}" required autofocus>
                </div>
                <div class="form-group mb-2">
                    <label for="localizacao" style="color: #fff">Localização:</label>
                    <input type="text" placeholder="Localização" id="localizacao" class="form-control"name="localizacao" value="{{ old('localizacao') }}" required autofocus>
                    @if ($errors->has('localizacao'))
                    <span class="text-danger">{{ $errors->first('localizacao') }}</span>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="descricao" style="color: #fff">Descrição:</label>
                    <input type="text" placeholder="Descrição" id="descricao" class="form-control"name="descricao" value="{{ old('descricao') }}" required autofocus>
                    @if ($errors->has('descricao'))
                    <span class="text-danger">{{ $errors->first('descricao') }}</span>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="image" style="color: #fff">Foto da criança:</label>
                    <input type="file" id="image" name="image" required>
                </div>

                <div class="row">
                    <div class="d-grid mx-auto mb-4">
                        <button type="submit" class="btn btn-success btn-block">Enviar</button>
                    </div>
                </div>       
            </form>    
        </div>
       
    </body>
</html>