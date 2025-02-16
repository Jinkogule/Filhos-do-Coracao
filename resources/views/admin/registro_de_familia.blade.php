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
        <title>Registro de Família</title>
        <link rel="icon" href=""/>
    </head>

    <body>
        <!--Navbar-->
        @include('comuns.navbar')

        @include('comuns.subheader')

        <div class="container container-cadastro">
            <br><h4 style="text-align: center;">Registro de Família</h4><hr>
            <form action="{{ route('registrarFamilia') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-2">
                    <div class="col">
                        <label for="nomes" style="color: #fff">Nomes:</label>
                        <input type="text" placeholder="Nomes das crianças" id="nomes" class="form-control" name="nomes" value="{{ old('nomes') }}" required autofocus>
                        @if ($errors->has('nomes'))
                        <span class="text-danger">{{ $errors->first('nomes') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="idades" style="color: #fff">Idades:</label>
                    <input type="text" placeholder="Idades das crianças" id="idades" class="form-control" name="idades" value="{{ old('idades') }}" required autofocus>
                    @if ($errors->has('idades'))
                    <span class="text-danger">{{ $errors->first('idades') }}</span>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label for="q_irmaos" style="color: #fff">Quantidade de irmãos:</label>
                    <input type="number" placeholder="Quantidade de irmãos" id="q_irmaos" class="form-control" name="q_irmaos" value="{{ old('q_irmaos') }}" required autofocus>
                    @if ($errors->has('q_irmaos'))
                    <span class="text-danger">{{ $errors->first('q_irmaos') }}</span>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="sexos" style="color: #fff">Sexo das crianças:</label>
                    <input type="text" placeholder="Sexo das crianças" id="sexos" class="form-control" name="sexos" value="{{ old('sexos') }}" required autofocus>
                    @if ($errors->has('sexos'))
                    <span class="text-danger">{{ $errors->first('sexos') }}</span>
                    @endif
                </div>
                <div class="col mb-2">
                    <label for="estados_de_saude" style="color: #fff">Estados de saúde das crianças:</label>
                    <input type="text" placeholder="Estados de saúde" id="estados_de_saude" class="form-control"name="estados_de_saude" value="{{ old('estados_de_saude') }}" required autofocus>
                </div>
                <div class="form-group mb-2">
                    <label for="localizacao" style="color: #fff">Localização das crianças:</label>
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
                    <label for="imagem" style="color: #fff">Foto das crianças:</label>
                    <input type="file" id="imagem" name="imagem" required>
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
