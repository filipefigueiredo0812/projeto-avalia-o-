@extends('layout')
@section('header')
    <h1>Eliminar Album</h1>
    @endsection
    
@section('conteudo')

<h3>Deseja eliminar o album</h3>
<h3>{{$album->titulo}}</h3>
<form action="{{route('albuns.destroy', ['id'=>$album->id_album])}}" method="post">
@csrf
@method('delete')
    <input type="submit" value="enviar">
    

</form>
@endsection