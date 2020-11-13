@extends('layout')
@section('titulo')
Albuns
@endsection
@section('header')
Resultados
@endsection
@section('conteudo')


@foreach($albuns as $album)
<a href="{{route('albuns.show',['id'=>$album->id_album])}}">
{{$album->titulo}}<br>
</a>
@endforeach


@endsection



