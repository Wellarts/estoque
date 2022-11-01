<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Sistema de Estoque</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example">

    <!-- Example Code -->

    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">ESTOQUE v1.0</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  cadastros
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('produtos.create') }}">Produtos</a></li>
                  <li><a class="dropdown-item" href="{{ route('fornecedores.create') }}">Fornecedores</a></li>
                  <li><a class="dropdown-item" href="{{ route('categorias.create') }}">Categorias</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Listar
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('produtos.index') }}">Produtos</a></li>
                  <li><a class="dropdown-item" href="#">Fornecedores</a></li>
                  <li><a class="dropdown-item" href={{ route('categorias.index') }}>Categorias</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Wellington
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Sair</a></li>

              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
        <div class="container">
           <div class="my-4">
                @include("flash::message")
           </div>
            @yield('content')
        </div>

    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
