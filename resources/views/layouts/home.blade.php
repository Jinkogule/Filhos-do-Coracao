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
        <title>Adoção de Crianças - Home</title>
        <link rel="icon" href="/imagens/favicon.png"/>
    </head>
    
    <body>
        <!--Navbar-->
        @include('comuns.navbar')

        @if(session()->has('message'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('message') }}
            </div>
        @endif
        
        <!--Subheader-->
        @include('comuns.subheader')
        
        <!--Conteúdo-->
        <div class="container conteudo-container">
            <br>
            <h2 style="text-align: center;"> Sobre o Filhos do Coração</h2>
            <br>
            O Filhos do Coração é um site de adoção de crianças que permite que diversas pessoas possam realizar o sonho possuir uma família, além de permitir que diversos órfãos tenham a oportunidade de finalmente obter um lar.
            <br>
            <img class="img-fluid" style="width: 100%; height: auto; padding: 10px;" src="/imagens/generica2.png"/><br>
            <br>
            <hr>
            <h2 style="text-align: center;">Profissionais da Área</h2>
            <br>
            <div class="row">
                
                <div class="container" style="margin-bottom: 10px;">
                    <a class="titulo-resultado" href=""></a>
                    <div class="row invisivel-mobile">
                        <div class="col-1">
                            <img src="/imagens/profissionais/psicologa.jfif" class="border" style="width: 80px; height: 80px;" alt="">
                        </div>
                        <div class="col-11">
                            Juliana Mendonça, psicóloga responsável pelas crianças do projeto.
                        </div>
                    </div>

                    <div class="row invisivel-desktop">
                        <div class="col-3">
                            <img src="/imagens/profissionais/psicologa.jfif" class="border" style="width: 80px; height: 80px;" alt="">
                        </div>
                        <div class="col-9">
                            <span>
                                Juliana Mendonça, psicóloga responsável por dar apoio às crianças do projeto.
                            </span>
                        </div>
                    </div>
                </div>

                <br>

                <div class="container" style="margin-bottom: 10px;">
                    <a class="titulo-resultado" href=""></a>
                    <div class="row invisivel-mobile">
                        <div class="col-1">
                            <img src="/imagens/profissionais/assistentesocial.jfif" class="border" style="width: 80px; height: 80px;" alt="">
                        </div>
                        <div class="col-11">
                            Jackson Marques, assistente social responsável do projeto.
                        </div>
                    </div>
                    
                    <div class="row invisivel-desktop">
                        <div class="col-3">
                            <img src="/imagens/profissionais/assistentesocial.jfif" class="border" style="width: 80px; height: 80px;" alt="">
                        </div>
                        <div class="col-9">
                            <span>
                                Jackson Marques, assistente social responsável do projeto.
                            </span>
                        </div>
                    </div>
                </div>

                <div class="container" style="margin-bottom: 10px;">
                    <a class="titulo-resultado" href=""></a>
                    <div class="row invisivel-mobile">
                        <div class="col-1">
                            <img src="/imagens/profissionais/advogada.jfif" class="border" style="width: 80px; height: 80px;" alt="">
                        </div>
                        <div class="col-11">
                            Mariana Medeiros, advogada responsável por verificar se o site cumpre com as questões éticas e legais relacionadas à exposição das imagens das crianças.
                        </div>
                    </div>
                    
                    <div class="row invisivel-desktop">
                        <div class="col-3">
                            <img src="/imagens/profissionais/advogada.jfif" class="border" style="width: 80px; height: 80px;" alt="">
                        </div>
                        <div class="col-9">
                            <span>
                                Mariana Medeiros, advogada responsável por verificar se o site cumpre com as questões éticas e legais relacionadas à exposição das imagens das crianças.
                            </span>
                        </div>
                    </div>
                </div>

                <div class="container" style="margin-bottom: 10px;">
                    <a class="titulo-resultado" href=""></a>
                    <div class="row invisivel-mobile">
                        <div class="col-1">
                            <img src="/imagens/profissionais/terapeutaocupacional.jfif" class="border" style="width: 80px; height: 80px;" alt="">
                        </div>
                        <div class="col-11">
                            Muligan Parker, terapeuta ocupacional responsável do projeto.
                        </div>
                    </div>
                    
                    <div class="row invisivel-desktop">
                        <div class="col-3">
                            <img src="/imagens/profissionais/terapeutaocupacional.jfif" class="border" style="width: 80px; height: 80px;" alt="">
                        </div>
                        <div class="col-9">
                            <span>
                                Muligan Parker, terapeuta ocupacional responsável do projeto.
                            </span>
                        </div>
                    </div>
                </div>

            </div>
            <br>
            <hr>
            <h2 style="text-align: center;">Depoimentos</h2>
            <div style="text-align: center;">
                <br>
                @foreach($events as $event)
                <?php
                if ($event->depoimento != null){
                ?>
                    <em>"{{$event->depoimento}}"</em>
                    <br>
                    - {{$event->adotante}}, ao adotar {{$event->adotada}}
                    <br>
                    <br>
                <?php
                }
                ?>
                @endforeach
                
                @foreach($events3 as $event3)
                <?php
                if ($event3->depoimento != null){
                ?>
                    <em>"{{$event3->depoimento}}"</em>
                
                    @foreach($events4 as $event4)
                    <?php
                    if ($event3->familia_id == $event4->id){
                    ?>
                        <br>
                        - {{$event3->adotante}}, ao adotar {{$event4->nomes}}
                    <?php
                    }
                    ?>
                    @endforeach
                    <br>
                    <br>
                <?php
                }
                ?>
                @endforeach
            </div>
            <hr>
            
            <h2 style="text-align: center;">Imagens</h2>
            <h4 style="text-align: center;">Algumas imagens enviadas por nossos adotantes:</h4>
            <br>
            <div class="row row-cols-1 row-cols-md-3 g-4 mx-auto">
            @foreach($events as $event)
                <?php
                if ($event->file_path != null){
                ?>
                    <img src="{{$event->file_path}}" style="width: 300px; height: auto;" alt="">
                <?php
                }
                ?>
                @endforeach
                
                @foreach($events3 as $event3)
                <?php
                if ($event3->file_path != null){
                ?>
                    <img src="{{$event3->file_path}}" style="width: 300px; height: auto;" alt="">
                <?php
                }
                ?>
                @endforeach
                
            </div>
            <hr>
            <h2 style="text-align: center;">Contatos</h2>
            <br>
            <span class="alert alert-danger" style="text-align: center;">Função desativada no momento!</span>
            <br>
            <br>
            <h3>Contate-nos através do seguinte formulário!</h3>
            <br>
            <!----Formulário---->
            <form action="https://formsubmit.co/lucaspimenta21@gmail.com" method="POST">
                <input type="hidden" name="_next" value="https://trabalho-adocaocriancas.herokuapp.com/processodeadocao"> <!-- Destino do redirecionamento pós envio do formulário -->
                <input type="hidden" name="_captcha" value="false"> <!-- Com (true) ou sem (false) Captcha -->
                <input type="hidden" name="_subject" value="New submission!"> <!-- Título do e-mail enviado -->
                
                <label for="Nome">Nome:</label>
                <input type="text" class="form-control" name="Nome" aria-describedby="" placeholder="Digite seu nome" required>

                <label for="Email">Email:</label>
                <input type="email" class="form-control" name="Email" aria-describedby="emailHelp" placeholder="seu@email.com.br" required>

                <label for="Mensagem">Mensagem:</label>
                <textarea class="form-control" name="Mensagem" rows="4"></textarea>
                <br>
            
                <button type="submit" class="btn" style="background-color: #1F519B; color: #fff" disabled>Enviar</button>
            </form>
            <!----Fim do Formulário---->
        </div>

    </body>
</html>