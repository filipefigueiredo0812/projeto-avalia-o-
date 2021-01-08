@extends('layout')
@section('header')
    <h1>Nova Música</h1>
    @endsection
    
@section('conteudo')
<form action="{{route('musicas.store')}}" method="post" enctype="multipart/form-data">
@csrf
    
    Título*: <input type="text" name="titulo" value="{{old('titulo')}}"><br>
    @if ($errors->has('titulo'))
    <div class="alert alert-danger" role="alert">
    Título inválido.<br><br>
    </div>
    @endif
    
    <br>

    Género: <select name="id_genero"><br>
    @foreach ($generos as $genero)
        <option value="{{$genero->id_genero}}">{{$genero->designacao}}</option>
    @endforeach
    </select>
    @if ($errors->has('id_genero'))
    <div class="alert alert-danger" role="alert">
    Género inválido.<br><br>
    </div>
    @endif
    
    <br>
    
    Músico: <select name="id_musico"><br>
    @foreach ($musicos as $musico)
        <option value="{{$musico->id_genero}}">{{$musico->nome}}</option>
    @endforeach
    </select>
    @if ($errors->has('id_musico'))
    <div class="alert alert-danger" role="alert">
    Músico inválido.<br><br>
    </div>
    @endif
    
    <br>Album: <select name="id_album"><br>
    @foreach ($albuns as $album)
        <option value="{{$album->id_album}}">{{$album->titulo}}</option>
    @endforeach
    </select>
    @if ($errors->has('id_album'))
    <div class="alert alert-danger" role="alert">
    Album inválido.<br><br>
    </div>
    @endif

    <input type="submit" value="enviar">
    

</form>
@endsection