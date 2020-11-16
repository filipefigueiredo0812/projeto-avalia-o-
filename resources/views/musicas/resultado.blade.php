@extends('layout')
@section('titulo')
Musicas
@endsection
@section('header')
Resultados
@endsection
@section('conteudo')


@foreach($musicas as $musica)
<a href="{{route('musicas.show',['id'=>$musica->id_musica])}}">
{{$musica->titulo}}<br>
</a>
@endforeach


@endsection



