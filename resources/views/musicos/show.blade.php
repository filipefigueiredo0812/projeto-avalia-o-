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
Fotografia:
@if(isset($musico->fotografia))
<img src="{{asset('fotos/musicos/'.$musico->fotografia)}}"><br>
@endif

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

@if(auth()->check())
@if(Gate::allows('admin'))
<a href="{{route('musicos.edit', ['id'=>$musico->id_musico])}}" class="btn btn-info" role="button">Editar Musico</a>

<a href="{{route('musicos.delete', ['id'=>$musico->id_musico])}}" class="btn btn-info" role="button">Eliminar Musico</a>
@endif
@endif

@endsection