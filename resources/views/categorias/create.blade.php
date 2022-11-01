@extends('layouts.app')
@section('content')

<h2>Cadastro de Categorias</h2>

<form action="{{route('categorias.store')}}" method="post">
    @csrf
     <div class="form-group">
        <label>Categoria</label>
        <input type="text" name="nome" class="form-control" value="{{ old('nome')}}">
     </div>
     <div>
        <button class="btn btn-lg btn-success float-end">Salvar</button>
     </div>

</form>
@endsection
