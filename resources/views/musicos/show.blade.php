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

<br>



@if(count($musico->albuns)>0)
Albúns:<br>
@foreach($musico->albuns as $album)
{{$album->titulo}}<br>
@endforeach
<br>
@else
<div class="alert alert-danger" role="alert">
<b>Ainda não lançou nenhum album.</b>
</div>
@endif


@if(count($musico->musicas)>0)
Músicas:<br>
@foreach($musico->musicas as $musica)
{{$musica->titulo}}<br>
@endforeach

@else
<div class="alert alert-danger" role="alert">
<b>Ainda não lançou nenhuma música</b>
</div>
@endif



@endsection