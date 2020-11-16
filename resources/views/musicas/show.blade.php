@extends('layout')
@section('titulo')
Musicas
@endsection
@section('header')
Musicas
@endsection
@section('conteudo')
ID: {{$musica->id_musica}}<br>
Título: {{$musica->titulo}}<br>

<br>

@if(isset($musica->musicos))
Musicos:<br>
{{$musica->musicos->nome}}<br>
<br>
@else
<div class="alert alert-danger" role="alert">
<b>Não tem musico definido.</b>
</div>
@endif


@if(isset($musica->albuns))
Albúns:<br>
{{$musica->albuns->titulo}}<br>
<br>
@else
<div class="alert alert-danger" role="alert">
<b>Não pertence a nenhum albúm.</b>
</div>
@endif


@if(isset($musica->generos))
Género:
{{$musica->generos->designacao}}<br>

@else
<div class="alert alert-danger" role="alert">
<b>A música ainda não tem género definido.</b>
</div>
@endif


@endsection