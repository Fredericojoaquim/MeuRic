@if (!Auth::check())
<input type="hidden" name="is_logado" value="1" >
@endif
@php

    if(Auth::check())
    {
        $nome_user=Auth::user()->name;
        $imagem_user=Auth::user()->img;
        $email=Auth::user()->email;
        $id=Auth::user()->id;
        $nome_role=Auth::user()->getRoleNames();

        $nome_role = ((is_null($nome_role)) ? "Não definido" : $nome_role[0]);
        $imagem_user = ((is_null($imagem_user)) ? url('img/user.png') : 'imagens'.'/'.$imagem_user);
        if (Auth::user()->getFirstMedia('imgs'))
            $imagem_user = Auth::user()->getFirstMediaUrl('imgs');
    }

@endphp

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{url('/')}}"><img id="page-logo" src="{{ url('template-pagina-inicial/images/ric.png') }}"
          style="width: 90px; padding: 0; margin: 0;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link">Página Inicial</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Percorrer por
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ url('Home/percorrer-colecao') }}">Coleções & Categorias</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ url("Home/percorrer-titulo") }}">Títulos</a></li>
                <li><a class="dropdown-item" href="{{ url("#") }}">Autores</a></li>
                <li><a class="dropdown-item" href="{{ url("Home/percorrer-orientador") }}">Orientadores</a></li>
                
                <li><a class="dropdown-item" href="{{ url("#") }}">Data de publicação</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Sobre
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ url("Home/sobre") }}">Sobre o Repositório</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ url("#") }}">Copyrights</a></li>
            </ul>
          </li>
          @if (!Auth::check())
            <li class="nav-item" style="float:right;"><a href="{{ url("/login") }}" class="nav-link">Login <i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
          @else
            <li class="nav-item"><a class="nav-link" href="#">Meus depósitos</a></li>
            <li class="nav-item dropdown m-0">
                <a href="#" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="user-img d-flex flex-row px-3" style="background-color: #e7dfdf4f; border-radius: 10px;">
                        <img class="rounded-circle" src="{{ url('img/user.png') }}" width="25" height="25" alt="User" style="margin-top: 2px;">
                        <div class="user-text pl-2 pt-1">
                            <h6>{{ $nome_user }} {{-- <br/><span class="text-muted"> {{ $nome_role }} </span> --}} </h6>
                        </div>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <div class="user-header d-flex flex-row mx-3">
                            <div class="avatar avatar-sm mr-2">
                                <img class="rounded-circle" src="{{ url('img/user.png') }}" width="30" height="30" alt="User">
                            </div>
                            <span> </span>
                            <div class="user-text">
                                <h6>{{ $nome_user }} <br/><span class="text-muted" style="font-size: 0.7em;"> {{ $nome_role }} </span></h6>
                            </div>
                        </div>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('home.user.perfil') }}">Perfil</a></li>
                    <li><a class="dropdown-item" href="{{ url('/arquivamento') }}">Novo depósito</a></li>
                    <li><a class="dropdown-item" href="{{ route('home.user.depositos') }}">Meus depósitos</a></li>
                    <li>
                        <form action="{{ url('/logout') }}" method="POST">
                            @csrf
                            <a href="{{ url('/logout') }}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                        </form>
                    </li>
                </ul>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
