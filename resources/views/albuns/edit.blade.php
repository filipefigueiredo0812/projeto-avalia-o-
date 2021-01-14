@extends('layout')
@section('header')
    <h1>Editar Álbum</h1>
    @endsection
    
@section('conteudo')
<form action="{{route('albuns.update', ['id'=>$album->id_album])}}" method="post"  enctype="multipart/form-data">
@csrf
    @method('patch')
    <div class="form-group row">
    Título*: <input type="text" name="titulo" value="{{$album->titulo}}"><br>
    @if ($errors->has('titulo'))
    <div class="alert alert-danger" role="alert">
    Título inválido.<br><br>
    </div>
    @endif
    </div>
    
    <div class="form-group row">
    Data Lançamento: <input type="date" name="data_lancamento" value="{{$album->data_lancamento}}"><br>
    @if ($errors->has('data_lancamento'))
    <div class="alert alert-danger" role="alert">
    Data inválida.<br><br>
    </div>
    @endif
    </div>
    
    <div class="form-group row">    
    Género: <select name="id_genero"><br>
    @foreach ($generos as $genero)
        <option value="{{$genero->id_genero}}" @if($genero->id_genero==$album->id_genero)selected @endif
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



    <div class="form-group row">    
    Músico: <select name="id_musico"><br>
    @foreach ($musicos as $musico)
        <option value="{{$musico->id_musico}}" @if($musico->id_musico==$album->id_musico)selected @endif
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
        
    <div class="form-group row">
    Músicas: <select name="id_musica[]" multiple="multiple" size=5><br>
    @foreach ($musicas as $musica)
    <option value="{{$musica->id_musica}}" @if(in_array($musica->id_musica, $musicasAlbum))selected @endif>{{$musica->titulo}}</option>
    @endforeach
    </select>
    @if ($errors->has('id_musica'))
    <div class="alert alert-danger" role="alert">
    Música inválida.<br><br>
    </div>
    @endif
    <br>
    </div>    

    <input type="submit" value="enviar">
</form>
@endsection