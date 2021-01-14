@extends('layout')
@section('titulo')
Generos
@endsection
@section('header')
Generos
@endsection
@section('conteudo')
ID: {{$genero->id_genero}}<br>
Designação: {{$genero->designacao}}<br>
Observação: {{$genero->observacoes}}<br>

<br>


@if(count($genero->musicas)>0)
Músicas:<br>
@foreach($genero->musicas as $musica)
{{$musica->titulo}}<br>
@endforeach
@else
<div class="alert alert-danger" role="alert">
<b>Não tem nenhuma música deste género</b>
</div>
@endif


<br>


@if(count($genero->albuns)>0)
Álbuns:<br>
@foreach($genero->albuns as $album)
{{$album->titulo}}<br>
@endforeach
@else
<div class="alert alert-danger" role="alert">
<b>Ainda não lançou nenhum album.</b>
</div>
@endif

@if(auth()->check())
@if(auth()->user()->id==$genero->id_user || Gate::allows('admin') || $genero->id_user==NULL)
<a href="{{route('generos.edit', ['id'=>$genero->id_genero])}}" class="btn btn-info" role="button">Editar Genero</a>

<a href="{{route('generos.delete', ['id'=>$musica->id_genero])}}" class="btn btn-info" role="button">Eliminar Genero</a>
@endif
@endif
@endsection