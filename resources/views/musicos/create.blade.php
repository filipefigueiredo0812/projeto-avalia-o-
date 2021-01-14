@extends('layout')
@section('header')
    <h1>Nova Música</h1>
    @endsection
    
@section('conteudo')
<form action="{{route('musicas.store')}}" method="post" enctype="multipart/form-data">
@csrf
    
    Nome*: <input type="text" name="nome" value="{{old('nome')}}"><br>
    @if ($errors->has('nome'))
    <div class="alert alert-danger" role="alert">
    Nome inválido.<br><br>
    </div>
    @endif
    
    <br>

    Nacionalidade*: <input type="text" name="nacionalidade" value="{{old('nacionalidade')}}"><br>
    @if ($errors->has('nacionalidade'))
    <div class="alert alert-danger" role="alert">
    Nacionalidade inválida.<br><br>
    </div>
    @endif
    
    <br>

    Data Nascimento*: <input type="date" name="data_nascimento" value="{{old('data_nascimento')}}"><br>
    @if ($errors->has('data_nascimento'))
    <div class="alert alert-danger" role="alert">
    Data de Nascimento inválida.<br><br>
    </div>
    @endif
    
    <br>
    

    <input type="submit" value="enviar">
    

</form>
@endsection