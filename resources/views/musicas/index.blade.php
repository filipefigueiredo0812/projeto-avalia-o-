@extends('layout')
@section('titulo')
Musicas
@endsection
@section('header')
Musicas
@endsection
@section('conteudo')

<div style="text-align:center">
<form method="post" action="{{route('musicas.form')}}">
        @csrf
        <label for="nome">Pesquisa:</label>
        <input type="text" name="nome">
        <button type="submit">Enviar</button>
</form>
</div>





<ul>
@foreach ($musicas as $musica)

<a href="{{route('musicas.show',['id'=>$musica->id_musica])}}">
<li>{{$musica->titulo}}
    
</li>
</a>
@endforeach
</ul>
{{$musicas->render()}}

@if(auth()->check())
@if(Gate::allows('admin'))
<a href="{{route('musicas.create')}}" class="btn btn-info" role="button">Nova Música</a>
@endif
@endif

@endsection




