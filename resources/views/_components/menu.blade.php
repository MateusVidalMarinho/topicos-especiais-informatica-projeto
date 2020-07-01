<nav class="navbar navbar-expand-lg navbar-dark primary-color-dark lighten-1">
    <div class="container">
        <a class="navbar-brand" href="{{ config('app.url') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-5" aria-controls="navbarSupportedContent-5" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-5">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="{{ config('app.url') }}/categorias">Categorias</a>
                </li>
                @auth
                @if (Auth::user()->is_admin == 1)
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="{{ config('app.url') }}/livros">Livros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="{{ config('app.url') }}/colecoes">Coleções</a>
                </li>
                @endif
                @endauth
            </ul>
            @if (Route::has('login'))
            @auth
            <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item avatar dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
                        <a class="dropdown-item waves-effect waves-light" href="{{ config('app.url') }}/perfil">Perfil</a>
                        <a class="dropdown-item waves-effect waves-light" href="{{ config('app.url') }}/colecoes">Minhas Coleções</a>
                        <a class="dropdown-item waves-effect waves-light" href="{{ config('app.url') }}/logout">Sair</a>
                    </div>
                </li>
            </ul>
            @else
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="/login">Entrar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="/register">Criar Conta</a>
                </li>
            </ul>
            @endauth
            @endif
        </div>
    </div>
</nav>
