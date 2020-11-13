<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('titulo')</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"> 
        <link rel="stylesheet" href="{{asset('css/fa.css')}}"> 
    </head>
    <body>
        <h1 style="color:red; text-align:center;">@yield('header')</h1>
        @yield('conteudo')
        <div class="navbar">
            
            <nav class="navbar fixed-bottom navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('musicos.index')}}"><i class="fas fa-home"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{route('musicos.index')}}">Musicos <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('albuns.index')}}">Albuns</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('musicas.index')}}">Músicas</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('generos.index')}}">Generos</a>
    </ul>
  </div>
</nav>
            
        </div>
        <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.js')}}"></script>
        <script src="{{asset('js/fa.js')}}"></script>
    </body>
</html>