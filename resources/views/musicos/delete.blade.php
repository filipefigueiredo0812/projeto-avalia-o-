@extends('layout')
@section('header')
    <h1>Eliminar Músico</h1>
    @endsection
    
@section('conteudo')

<h3>Deseja eliminar o músico</h3>
<h3>{{$musica->titulo}}</h3>
<form action="{{route('musicos.destroy', ['id'=>$musico->id_musico])}}" method="post">
@csrf
@method('delete')
    <input type="submit" value="enviar">
    

</form>
@endsection