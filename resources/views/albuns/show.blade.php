@extends('layout')
@section('titulo')
Albuns
@endsection
@section('header')
Albuns
@endsection
@section('conteudo')
ID: {{$album->id_album}}<br>
Título: {{$album->titulo}}<br>
Data de Lançamento: {{$album->data_lancamento}}<br>
Observações: {{$album->observacoes}}<br>


<br>
@if(isset($album->generos))
Género:
{{$album->generos->designacao}}<br>

@else
<div class="alert alert-danger" role="alert">
<b>O albúm ainda não tem género definido.</b>
</div>
@endif

<br>

@if(isset($album->musicos))
Musico:
{{$album->musicos->nome}}<br>

@else
<div class="alert alert-danger" role="alert">
<b>Este albúm não tem um músico definido.</b>
</div>
@endif

<br>
@if(count($album->musicas)>0)
Músicas:<br>
@foreach($album->musicas as $musica)
{{$musica->titulo}}<br>
@endforeach
@else
<div class="alert alert-danger" role="alert">
<b>Album sem músicas</b>
</div>
@endif
<br>




@if(auth()->check())
@if(Gate::allows('admin'))
<a href="{{route('albuns.edit', ['id'=>$album->id_album])}}" class="btn btn-info" role="button">Editar Album</a>

<a href="{{route('albuns.delete', ['id'=>$album->id_album])}}" class="btn btn-info" role="button">Eliminar Album</a>
@endif
@endif



@endsection