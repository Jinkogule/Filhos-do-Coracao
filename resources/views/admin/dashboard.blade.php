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
        <title>Home - Administrador</title>
        <link rel="icon" href=""/>
    </head>
    
    <body>
        @include('admin.navbar')

        @if(session()->has('message'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('message') }}
            </div>
        @endif
  
        <?php
        
        $events = DB::table('criancas')->select('*')->orderByDesc('id')->paginate(1);
        $events2 = DB::table('filas')->select('*')->orderByDesc('id')->paginate(100);
        $events2_contagem = DB::table('filas')->select('*')->orderByDesc('id')->paginate(100)->count();

        if ($events2_contagem > 0){
            foreach ($events as $event){
                foreach ($events2 as $event2){
                    if ($event2->crianca_sexo == $event->sexo && $event2->crianca_idade == $event->idade){
                        ?>
                        <form name="notificacao-fila" action="https://formsubmit.co/lucaspimenta21@gmail.com" method="POST">
                            <input type="hidden" name="_cc" value="{{ $event2->adotante_email }}">
                            <input type="hidden" name="_next" value="https://trabalho-adocaocriancas.herokuapp.com/dashboard"> <!-- Destino do redirecionamento pós envio do formulário -->
                            <input type="hidden" name="_captcha" value="false"> <!-- Com (true) ou sem (false) Captcha -->
                            <input type="hidden" name="_subject" value="Uma criança com o perfil que deseja adotar foi registrada no site."> <!-- Título do e-mail enviado -->
                            <input type="hidden" name="Atualização do status de sua fila de espera" value="Uma criança com o perfil que deseja adotar foi registrada no site."> <!-- Com (true) ou sem (false) Captcha -->
                        </form>

                        <script type="text/javascript">
                            window.onload=function(){
                                function submitform(){
                                document.forms["notificacao-fila"].submit();
                                }
                                submitform();
                            }
                        </script>

                        <?php
                        DB::table('filas')->where('adotante_id', $event2->adotante_id)->delete();
                    }
                }
            }
        }
    
        ?>
        
        <!--Sub-Header-->
        @include('comuns.subheader')

        <!--Conteúdo-->
        <div class="container conteudo-container">
            <a class="btn btn-primary" href="{{ route('registro_de_crianca') }}" role="button">Registrar Criança</a>
            <br>
            <br>
            <a class="btn btn-primary" href="{{ route('registro_de_familia') }}" role="button">Registrar Família</a>
            <br>
            <br>
            <a class="btn btn-primary" href="/adocoes-pendentes" role="button">Visualizar adoções pendentes</a>
            <br>
            <br>
            <a class="btn btn-primary" href="/candidatos-a-pais" role="button">Candidatos a pais</a>
            
        </div>

    </body>
</html>

