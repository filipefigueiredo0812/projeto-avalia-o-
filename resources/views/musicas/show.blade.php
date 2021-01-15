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

@if(isset ($musica->users->name))
        Registado por: {{$musica->users->name}}<br>
    @else
        <div class="alert alert-danger" role="alert">
        Não foi registado por um utilizador.<br>
        </div>
    @endif
</ul>
Likes:{{$likes}}
@if(Auth()->check())
    @if($utilizador != null)
    <i class="fas fa-heart" style="color: red"></i>
    @else
    <a href="{{route('musicas.like',['id'=>$musica->id_musica])}}">
    <i class="fas fa-heart"></i>
    </a>
@endif
@endif
<br>
<br>
<br>
@if(auth()->check())
@if(auth()->user()->id==$musica->id_user || Gate::allows('admin') || $musica->id_user==NULL)
<a href="{{route('musicas.edit', ['id'=>$musica->id_musica])}}" class="btn btn-info" role="button">Editar Musica</a>

<a href="{{route('musicas.delete', ['id'=>$musica->id_musica])}}" class="btn btn-info" role="button">Eliminar Musica</a>
@endif
@endif



@endsection