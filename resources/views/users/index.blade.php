@extends('layout')

@section('header')
@endsection

@section('conteudo')
<h3>Users</h3>
<ul>

@foreach($users as $user)
<li>
    <h6>{{$user->name}}<br>  {{$user->email}} <br> {{$user->tipo_user}}<h6>
</li>
@endforeach
   <br> 
</ul>


@endsection
