<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('titulo')</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"> 
        <link rel="stylesheet" href="{{asset('css/fa.css')}}"> 
        
        <style>
        .container{ width:100%; height:100%;}
            
            html, body {
            height: 100%;
            margin: 0;
            }
            body{
            background: #536976;  
            background: -webkit-linear-gradient(to right, #292E49, #536976); 
            background: linear-gradient(to right, #292E49, #536976);

            background-repeat: no-repeat; height:100%;
            }
            
            a:link {
            color: black;
            background-color: transparent;
            text-decoration: none;
            }

            a:visited {
            color: black;
            background-color: transparent;
            text-decoration: none;
            }

            a:hover {
            color: black;
            background-color: transparent;
            text-decoration: underline;
            }

            a:active {
            color: black;
            background-color: transparent;
            text-decoration: underline;
            }
            
            img{
            display:block;
            margin-left: auto;
            margin-right: auto;
            margin-top:115px;
            width: 65%;         
            }
        </style>
        
        
    </head>
    <body>
    <div class="container">
        <h1 style="text-shadow: 3px 3px 3px rgba(255, 255, 255, 0.4);  text-align:center;">@yield('header')</h1>
        <div>
        @yield('conteudo')
           
        <img src="{{asset('imagens/f7cb9698b145d293c5a2c79af154109febd9845b_hq.gif')}}" alt="GIF" /> 
            
        <div class="navbar">
            
            <nav class="navbar fixed-bottom navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('musicos.index')}}"><i class="fas fa-home"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{route('musicos.index')}}">Musicos</a>
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
            </div>
        
        <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.js')}}"></script>
        <script src="{{asset('js/fa.js')}}"></script>
        </div>
    </body>
</html>