@extends('layout')
@section('header')
    <h1>Eliminar Música</h1>
    @endsection
    
@section('conteudo')

<h3>Deseja eliminar a música</h3>
<h3>{{$musica->titulo}}</h3>
<form action="{{route('musicas.destroy', ['id'=>$musica->id_musica])}}" method="post">
@csrf
@method('delete')
    <input type="submit" value="enviar">
    

</form>
@endsection