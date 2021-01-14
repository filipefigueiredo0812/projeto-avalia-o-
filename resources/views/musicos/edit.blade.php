@extends('layout')
@section('header')
    <h1>Editar Músico</h1>
    @endsection
    
@section('conteudo')
<form action="{{route('musicos.update', ['id'=>$musico->id_musico])}}" method="post"  enctype="multipart/form-data">
@csrf
    @method('patch')
    <div class="form-group row">
    Nome*: <input type="text" name="nome" value="{{$musico->nome}}"><br>
    @if ($errors->has('nome'))
    <div class="alert alert-danger" role="alert">
    Nome inválido.<br><br>
    </div>
    @endif
    </div>
    
    <div class="form-group row">
    Nacionalidade: <input type="text" name="nacionalidade" value="{{$musico->nacionalidade}}"><br>
    @if ($errors->has('nacionalidade'))
    <div class="alert alert-danger" role="alert">
    Nome inválido.<br><br>
    </div>
    @endif
    </div>

    <div class="form-group row">
    Data Nascimento: <input type="date" name="data_nascimento" value="{{$musico->data_nascimento}}"><br>
    @if ($errors->has('data_nascimento'))
    <div class="alert alert-danger" role="alert">
    Nome inválido.<br><br>
    </div>
    @endif
    </div>
    
    <div class="form-group row">
    Fotografia: <input type="file" name="fotografia" value="{{$musico->fotografia}}"><br>
    @if ($errors->has('fotografia'))
    <div class="alert alert-danger" role="alert">
    Imagem inválida.<br><br>
    </div>
    @endif
    </div>


    <input type="submit" value="enviar">
</form>
@endsection