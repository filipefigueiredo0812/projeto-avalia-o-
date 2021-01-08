@extends('layout')
@section('header')
    <h1>Editar Música</h1>
    @endsection
    
@section('conteudo')
<form action="{{route('musicas.update', ['id'=>$musica->id_musica])}}" method="post"  enctype="multipart/form-data">
@csrf
    @method('patch')
    <div class="form-group row">
    Título*: <input type="text" name="titulo" value="{{$musica->titulo}}"><br>
    @if ($errors->has('titulo'))
    <div class="alert alert-danger" role="alert">
    Título inválido.<br><br>
    </div>
    @endif
    </div>
    
    div class="form-group row">    
    Género: <select name="id_genero"><br>
    @foreach ($generos as $genero)
        <option value="{{$genero->id_genero}}" @if($genero->id_genero==$musica->id_genero)selected @endif
            >{{$genero->designacao}}</option>
    @endforeach
    @if ($errors->has('id_genero'))
    <div class="alert alert-danger" role="alert">
    Género inválido.<br><br>
    </div>
    @endif
    </select>
    <br>
    </div>

    div class="form-group row">    
    Músico: <select name="id_musico"><br>
    @foreach ($musicos as $musico)
        <option value="{{$musico->id_musico}}" @if($musico->id_musico==$musica->id_musico)selected @endif
            >{{$musico->nome}}</option>
    @endforeach
    @if ($errors->has('id_musico'))
    <div class="alert alert-danger" role="alert">
    Musico inválido.<br><br>
    </div>
    @endif
    </select>
    <br>
    </div> 

    div class="form-group row">    
    Album: <select name="id_album"><br>
    @foreach ($albuns as $album)
        <option value="{{$album->id_album}}" @if($album->id_album==$musica->id_album)selected @endif
            >{{$album->titulo}}</option>
    @endforeach
    @if ($errors->has('id_album'))
    <div class="alert alert-danger" role="alert">
    Album inválido.<br><br>
    </div>
    @endif
    </select>
    <br>
    </div>     
        
    

    <input type="submit" value="enviar">
    

</form>
@endsection