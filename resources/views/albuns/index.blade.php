@extends('layout')
@section('titulo')
Albuns
@endsection
@section('header')
Albuns
@endsection
@section('conteudo')

<div style="text-align:center">
<form method="post" action="{{route('albuns.form')}}">
        @csrf
        <label for="nome">Pesquisa:</label>
        <input type="text" name="nome">
        <button type="submit">Enviar</button>
</form>
</div>





<ul>
@foreach ($albuns as $album)

<a href="{{route('albuns.show',['id'=>$album->id_album])}}">
<li>{{$album->titulo}}
    
</li>
</a>
@endforeach
</ul>


{{$albuns->render()}}
@endsection




