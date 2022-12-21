@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')


@section('content')


    <div>
        <h2>Produtos</h2>
        <div class="clearfix"></div>
    </div>


    <table class="table table-bordered table-striped dataTable dtr-inline collapsed" id="idTable">
        <thead>
            <tr>
                <th>#</th>
                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Produtos</th>
                <th>Categoria</th>
                <th>Fornecedor</th>
                <th>Valor Compra</th>
                <th>Valor Venda</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->produto }}</td>
                    <td>{{ $produto->idFkCategoria }}</td>
                    <td>{{ $produto->idFkFornecedor }}</td>
                    <td>{{ $produto->valorCompra }}</td>
                    <td>{{ $produto->valorVenda }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('produtos.show', ['produto' => $produto->id]) }}"
                                class="btn btn-sm btn-primary">Editar</a>

                            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Remover</a>

                        </div>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="4">Nada encontrado!</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $produtos->links() }}

    <!-- Modal -->
    <form action="{{ route('produtos.destroy', ['produto' => $produto->id]) }}" method="post">
        @csrf
        @method('DELETE')

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-left">Confirma a exclusão do registro?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
