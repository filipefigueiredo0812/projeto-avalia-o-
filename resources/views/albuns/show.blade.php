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





@if(isset($album->musicas->titulo))
Músicas:{{$album->musicas->titulo}}<br>
@else
<div class="alert alert-danger" role="alert">
<b>Album sem músicas</b>
</div>
@endif








@endsection