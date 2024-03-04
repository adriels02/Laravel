@extends('master')

@section('content')

<h2>Edição de usuário</h2>

@if (session()-> has('message'))
{{ session() -> get('message') }}
@endif

<form action="{{ route('users.update', ['user' => $user -> id])}}" method="post">
    @csrf
    <input type="hidden" name="_method" value= "PUT">
    <input type="text" name="nome" value = "{{ $user -> nome }}">
    <input type="text" name="sobrenome" value = "{{ $user -> sobrenome }}">
    <input type="text" name="email" value = "{{ $user -> email }}">
    <button type="submit">Update</button>
</form>

@endsection