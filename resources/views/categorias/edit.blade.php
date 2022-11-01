@extends('layouts.app')

@section('content')
    <form action="{{route('categorias.update', ['categoria' => $categoria->id])}}" method="post">

            @csrf
            @method("PUT")

            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" value="{{$categoria-> nome}}">
            </div>
        <div class="float-end">
            <button class="btn btn-success float-right">Atualizar Categoria</button>
        </div>
 </form>
 @endsection
