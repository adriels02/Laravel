@extends('master')

@section('content')

<h2>Criar</h2>

@if (session()-> has('message'))
{{ session() -> get('message') }}
@endif

<form action="{{ route('users.store') }}" method="post">
    @csrf
   
    <input type="text" name="nome" placeholder= "Seu nome">
    <input type="text" name="sobrenome" placeholder= "Seu sobrenome">
    <input type="text" name="email" placeholder= "Seu email">
    <input type="text" name="senha" placeholder= "Sua senha">
    <button type="submit">Criar </button>
</form>

@endsection