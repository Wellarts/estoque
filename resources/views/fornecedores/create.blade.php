@extends('layouts.app')
@section('content')

<form action="{{route('produtos.store')}}" method="post">
    @csrf
     <div class="form-group">
        <label>Nome</label>
        <input type="text" name="name" class="form-control" value="{{ old('name')}}">
        <label>Estado</label>
        <input type="text" name="estado" class="form-control" value="{{ old('estado')}}">
        <label>Cidade</label>
        <input type="text" name="cidade" class="form-control" value="{{ old('cidade')}}">
        <label>Telefone</label>
        <input type="text" name="telefone" class="form-control" value="{{ old('telefone')}}">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="{{ old('email')}}">
    </div>
</form>
@endsection
