@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

    <h2>Cadastro de Produtos</h2>
@stop

@section('content')

    <form action="{{ route('produtos.store') }}" method="post">

        @csrf
        <div class="col-auto">
            <div class="form-group">
                <label>Produto</label>
                <input type="text" name="produto" class="form-control" value="{{ old('produto') }}">
            </div>
            <div class="row">
                <div class="col-6">
                    <label>Categoria</label>
                    <select class="form-control" aria-label="Default select example" name="idFkCategoria">
                        @foreach ($categorias as $c)
                            <option value="{{ $c->id }}">{{ $c->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
                    <label>Fornecedor</label>
                    <select class="form-control" aria-label="Default select example" name="idFkFornecedor">
                        @foreach ($fornecedores as $f)
                            <option value="{{ $f->id }}"> {{ $f->nome }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label>Valor de Custo</label>
                    <input type="number" name="valorCompra" class="form-control" value="{{ old('valorCusto') }}">
                </div>
                <div class="col-6">

                    <label>Valor de Venda</label>
                    <input type="number" name="valorVenda" class="form-control" value="{{ old('valorVenda') }}">
                </div>
            </div>
        </div>
        <div class="p-2">
            <button class="btn btn-success float-right">Salvar</button>
        </div>


    </form>
@stop
