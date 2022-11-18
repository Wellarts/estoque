<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

    <title>Sistema de Estoque</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                  <li><a class="dropdown-item" href="{{ route('home') }}">testes</a></li>
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
    </body>
</html>
