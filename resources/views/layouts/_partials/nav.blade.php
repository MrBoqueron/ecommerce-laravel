<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Tienda x</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" :class="{'active': route().current('home')}" aria-current="page" href="{{ route('home') }}">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" :class="{'active': route().current('categorias')}" href="{{ route('cart') }}">Carrito</a>
        @can('admin.home')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.index') }}">Panel de administrador</a>
        </li>
        @endcan
    </ul>
    <form class="d-flex" role="search">
        @if (auth()->check())
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('perfil') }}">Mi Perfil</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}">Cerrar session</a></li>
          </ul>
        </div>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline-success me-2 m-6">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-success">Registrarse</a>
        @endif
      </form>
    </div>
  </div>
</nav>