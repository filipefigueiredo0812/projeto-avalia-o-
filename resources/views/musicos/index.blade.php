@extends('layout')
@section('titulo')
Musicos
@endsection
@section('header')
Musicos
@endsection
@section('conteudo')

<div style="text-align:center">
<form method="post" action="{{route('musicos.form')}}">
        @csrf
        <label for="nome">Pesquisa:</label>
        <input type="text" name="nome">
        <button type="submit">Enviar</button>
</form>
</div>





<ul>
@foreach ($musicos as $musico)

<a href="{{route('musicos.show',['id'=>$musico->id_musico])}}">
<li>{{$musico->nome}}
    
</li>
</a>
@endforeach
</ul>


{{$musicos->render()}}

@if(auth()->check())
@if(Gate::allows('admin'))
<a href="{{route('musicos.create')}}" class="btn btn-info" role="button">Novo Músico</a>
@endif
@endif
@endsection




