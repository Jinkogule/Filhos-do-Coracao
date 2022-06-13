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
        <title>Processo de Adoção</title>
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
        <h2 style="text-align: center;">Processo de Adoção</h2>
        <br>
        <strong>Para realizar uma adoção é necessário concluir as seguintes etapas:</strong>
        <br><br>
        <strong>1</strong> – Caso não possua uma conta, realize seu cadastro e, em seguida, faça o login.
        <br><br>
        <strong>2</strong> – Através do Menu ou pela Home, acesse o botão “Visualizar crianças disponíveis para adoção” para acessar a página onde estão disponíveis as crianças esperando por uma adoção.
        <br><br>
        <strong>3</strong> – Ao escolher a criança que deseja adotar, clique em “Mais informações” sobre a respectiva criança que se pretende adotar, para ter acesso a mais detalhes sobre ela e para poder ter acesso ao botão “Adotar”.
        <br><br>
        <strong>4</strong> – Após ver mais informações sobre a criança, clique em “Adotar”, faça uma breve descrição do que o motivou a querer adotar uma criança e, em seguida, clique em “confirmar” para concluir a solicitação de adoção.
        <br><br>
        <strong>5</strong> – Caso queira adotar uma família de irmãos ao invés de uma única criança é necessário que, no passo 2, acesse a página "Famílias para adoção" ao invés de "Crianças para adoção", acessível pela Home ou pelo Menu, em seguida os passos 3 e 4 serão iguais.
        <br><br>
        <strong>6</strong> – Após concluir a solicitação de adoção, é necessário esperar que um administrador aprove ou recuse sua solicitação. É possível visualizar o status de suas adoções na página “Minhas adoções”, acessível pelo Menu ou pela Home.
        <br><br>
        <strong>7</strong> – Caso queira cancelar a solicitação de adoção enquanto ela não é nem aprovada nem recusada pelos administradores, é possível cancelá-la na página de "Minhas adoções", clicando em “Cancelar solicitação de adoção”, disponível sobre a respectiva adoção.
        <br><br>
        <strong>8</strong> – Após sua adoção ser aprovada, o adotante pode buscar a criança no orfanato para inicializar a adoção.
        <br><br>
        <strong>9</strong> - Após um momento convivendo com a criança adotada (de 3 a 7 dias), necessitamos que nos dê um feedback sobre a experiência:
        <br><br>
        - Caso não tenha dado certo, na página de "Minhas adoções" clique em “Adoção malsucedida”, disponível sobre a respectiva adoção, para nos explicar os motivos da adoção não ter ocorrido como o esperado e para que a criança volte ao orfanato à espera de uma nova família.
        <br><br>
        - Caso tudo tenha ocorrido como o esperado, clique em “Adoção bem-sucedida”, disponível sobre a respectiva adoção, e nos dê seu depoimento sobre como está sendo para você conseguir realizar o desejo de adotar uma criança.
        <br><br>
        <strong>OBS: cada atualização sobre o status de sua adoção será notificada por e-mail para o adotante (atente-se à sua caixa de mensagens do correio eletrônico!).</strong>
        <br><br>
        <strong>Documentação necessária para realizar uma adoção:</strong>
        <br>
        Nome, sobrenome, data de nascimento, gênero, e-mail (requisitados durante o cadastro) e motivação para adotar uma criança (requisitada durante a adoção).
        <br><br>

            <h1 style="text-align: center;">Envie-nos sua dúvida!</h1>
            <br>
            <span class="alert alert-danger">Função desativada no momento!</span>
            <br>
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