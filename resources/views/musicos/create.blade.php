@extends('layout')
@section('header')
    <h1>Nova Música</h1>
    @endsection
    
@section('conteudo')
<form action="{{route('musicos.store')}}" method="post" enctype="multipart/form-data">
@csrf
    
    Nome*: <input type="text" name="nome" value="{{old('nome')}}"><br>
    @if ($errors->has('nome'))
    <div class="alert alert-danger" role="alert">
    Nome inválido.<br><br>
    </div>
    @endif
    
    <br>

    Nacionalidade: <input type="text" name="nacionalidade" value="{{old('nacionalidade')}}"><br>
    @if ($errors->has('nacionalidade'))
    <div class="alert alert-danger" role="alert">
    Nacionalidade inválida.<br><br>
    </div>
    @endif
    
    <br>

    Data Nascimento: <input type="date" name="data_nascimento" value="{{old('data_nascimento')}}"><br>
    @if ($errors->has('data_nascimento'))
    <div class="alert alert-danger" role="alert">
    Data de Nascimento inválida.<br><br>
    </div>
    @endif
    
    <br>
    
    Fotografia: <input type="file" name="fotografia" value="{{old('fotografia')}}"><br>
    @if ($errors->has('fotografia'))
    <div class="alert alert-danger" role="alert">
    Imagem inválida.<br><br>
    </div>
    @endif

    <input type="submit" value="enviar">
    

</form>
@endsection