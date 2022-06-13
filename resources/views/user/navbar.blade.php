<!--Navbar-->
<!--Navbar Menu-->
<nav class="navbar navbar1 navbar-expand-md fixed-top">
    <div class="container-fluid container-menu" style="position: relative;">

        <!-- Dropdown -->
        <div class="dropdown">
            <!-- dropdown menu-->
            <ul class="main">
                <li class="desplegable">
                    <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="" class="curso">Menu</a>
                    <ul class="grupo-desplegable">
                        <li><a class="dropdown-item" href="/dashboard">Home</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/minhas-adocoes">Minhas Adoções</a></li>
                        <li><a class="dropdown-item" href="/criancas-para-adocao">Crianças para adoção</a></li>
                        <li><a class="dropdown-item" href="/familias-para-adocao">Famílias para adoção</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/processodeadocao">Processo de Adoção</a></li>
                        <li><a class="dropdown-item" href="/casesdesucesso">Casos de Sucesso</a></li>                              
                    </ul>
                </li> 
            </ul>
        </div>
        <!-- Dropdown -->

        <!-- Brand -->
        <a class="navbar-brand navbar-brand-dashboard logo centraliza" href="/">
            <img src="/imagens/favicon.png" style="width: 30px; height: auto">
            <span class="bem-vindo "></span>
        </a>
        <!-- Brand -->

        <div>
            <!-- Busca -->
            <div class="btn-group">
                <a class="nav-link" href="{{ route('sair') }}">Sair</a>
                <button type="button " class="btn" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" style="color: #fff">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
                <ul class="dropdown-menu dropdown-menu-end busca-mobile">
                    <form class="d-flex posicao-busca" method="GET" action="">
                        @csrf
                        <input class="form-control form-control-sm" name="busca" placeholder="Busca..." aria-label="Busca...">   
                        <button 
                            class="btn btn-outline-success" type="submit">Ir
                        </button>
                    </form>
                </ul>
            </div>
            <!-- Busca -->
        </div>
    </div>

</nav>
<!--Menu-->