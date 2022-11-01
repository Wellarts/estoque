@extends('layouts.app')
@section('content')

<h2>Cadastro de Produtos</h2>

<form action="{{route('produtos.store')}}" method="post">
    @csrf
     <div class="form-group">
        <label>Produto</label>
        <input type="text" name="produto" class="form-control" value="{{ old('produto')}}">
        <label>Categoria</label>
        <select class="form-select" aria-label="Default select example">
            @foreach($categorias as $c)
                <option value="{{$c->id}}">{{$c->nome}}</option>
            @endforeach
        </select>
        <label>Fornecedor</label>
        <select class="form-select" aria-label="Default select example">
            @foreach($fornecedores as $f)
                <option value="{{$f->id}}"> {{$f->nome}} </option>
            @endforeach
        </select>
        <label>Valor de Custo</label>
        <input type="text" name="valorCompra" class="form-control" value="{{ old('valorCusto')}}">
        <label>Valor de Venda</label>
        <input type="text" name="valorVenda" class="form-control" value="{{ old('valorVenda')}}">
     </div>

        <div>
            <button class="btn btn-lg btn-success float-end">Salvar</button>
         </div>

</form>
@endsection
