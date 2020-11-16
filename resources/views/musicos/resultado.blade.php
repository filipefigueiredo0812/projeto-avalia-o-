@extends('layout')
@section('titulo')
Musicos
@endsection
@section('header')
Resultados
@endsection
@section('conteudo')


@foreach($musicos as $musico)
<a href="{{route('musicos.show',['id'=>$musico->id_musico])}}">
{{$musico->nome}}<br>
</a>
@endforeach


@endsection



