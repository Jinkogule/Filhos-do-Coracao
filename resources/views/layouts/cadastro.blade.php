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
        <title>Cadastro</title>
        <link rel="icon" href=""/>
    </head>

    <body>
        <!--Navbar-->
        @include('comuns.navbar')

        <!--Subheader-->
        @include('comuns.subheader')

        <div class="container container-cadastro">
            <br><h4 style="text-align: center;">Cadastro</h4><hr>
            <form action="{{ route('realizarCadastro') }}" method="POST">
                @csrf
                <div class="row mb-2">
                    <div class="col">
                        <label for="nome" style="color: #fff">Nome:</label>
                        <input type="text" placeholder="Insira seu nome" id="nome" class="form-control" name="nome" value="{{ old('nome') }}" required autofocus>
                        @if ($errors->has('nome'))
                        <span class="text-danger">{{ $errors->first('nome') }}</span>
                        @endif
                    </div>
                    <div class="col">
                        <label for="sobrenome" style="color: #fff">Sobrenome:</label>
                        <input type="text" placeholder="Insira seu sobrenome" id="sobrenome" class="form-control" name="sobrenome" value="{{ old('sobrenome') }}" required autofocus>
                        @if ($errors->has('sobrenome'))
                        <span class="text-danger">{{ $errors->first('sobrenome') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="data_nascimento" style="color: #fff">Data de nascimento:</label>
                    <input type="date" placeholder="Insira sua data de nascimento" id="data_nascimento" class="form-control" name="data_nascimento" value="{{ old('data_nascimento') }}" required autofocus>
                    @if ($errors->has('data_nascimento'))
                    <span class="text-danger">{{ $errors->first('data_nascimento') }}</span>
                    @endif
                </div>
                <div class="col mb-4">
                    <label for="genero" style="color: #fff">Seu gênero:</label>
                    <select class="form-control" id="genero" name="genero" value="{{ old('genero') }}" required autofocus>
                        <option></option>
                        <option>Homem Cisgênero</option>
                        <option>Mulher Cisgênero</option>
                        <option>Mulher Trans</option>
                        <option>Homem Trans</option>
                        <option>Travesti</option>
                        <option>Transexual</option>
                        <option>Queer</option>
                        <option>Não-binário</option>
                        <option>Gênero fluído</option>
                        <option>Transgênero</option>
                        <option>Prefiro não responder</option>
                        <option>Outro / outra</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="email" style="color: #fff">E-mail:</label>
                    <input type="text" placeholder="Insira seu e-mail" id="email" class="form-control"name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="password" style="color: #fff">Senha:</label>
                    <input type="password" placeholder="Insira sua senha" id="password" class="form-control" name="password" required autofocus>
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
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