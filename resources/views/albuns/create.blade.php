@extends('layout')
@section('header')
    <h1>Novo Álbum</h1>
    @endsection
    
@section('conteudo')
<form action="{{route('albuns.store')}}" method="post" enctype="multipart/form-data">
@csrf
    
    Título*: <input type="text" name="titulo" value="{{old('titulo')}}"><br>
    @if ($errors->has('titulo'))
    <div class="alert alert-danger" role="alert">
    Título inválido.<br><br>
    </div>
    @endif
    
    <br>

    Data Lançamento: <input type="date" name="data_lancamento" value="{{old('data_lancamento')}}"><br>
    @if ($errors->has('data_lancamento'))
    <div class="alert alert-danger" role="alert">
    Data de Lançamento inválida.<br><br>
    </div>
    @endif

    Observações: <textarea type="text" name="observacoes">{{old('observacoes')}}</textarea><br>
    @if ($errors->has('observacoes'))
    <div class="alert alert-danger" role="alert">
    Observação inválida.<br><br>
    </div>
    @endif

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
        <option value="{{$musico->id_musico}}">{{$musico->nome}}</option>
    @endforeach
    </select>
    @if ($errors->has('id_musico'))
    <div class="alert alert-danger" role="alert">
    Músico inválido.<br><br>
    </div>
    @endif
    
    Músicas: <select name="id_musica[]" multiple="multiple"><br>
    @foreach ($musicas as $musica)
    <option value="{{$musica->id_musica}}">{{$musica->titulo}}</option>
    @endforeach
    </select>
    @if ($errors->has('id_musica'))
    <div class="alert alert-danger" role="alert">
    Musica inválida.<br><br>
    </div>
    
    @endif
    <br>

    <input type="submit" value="enviar">
    

</form>
@endsection