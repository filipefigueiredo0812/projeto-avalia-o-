@extends('layout')
@section('titulo')
Musicos
@endsection
@section('header')
Musicos
@endsection
@section('conteudo')
ID: {{$musico->id_musico}}<br>
Nome: {{$musico->nome}}<br>
Nacionalidade: {{$musico->nacionalidade}}<br>
Data de Nascimento: {{$musico->data_nascimento}}<br>

Fotografia: {{$musico->fotografia}}<br>





@if(count($musico->musicas)>0)
Músicas:{{$musico->musicas->titulo}}<br>
@else
<div class="alert alert-danger" role="alert">
<b>Ainda não lançou nenhuma música</b>
</div>
@endif





@if(count($musico->albuns)>0)
Músicas:{{$musico->albuns->titulo}}<br>
@else
<div class="alert alert-danger" role="alert">
<b>Ainda não lançou nenhum album.</b>
</div>
@endif


@endsection