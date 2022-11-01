@extends('layouts.app')

 @section('content')
 	<div  class="float-end">
		<a href="{{route('categorias.create')}}" class="btn btn-success">Criar Categoria</a>
    </div>
    <div>
		<h2>Categorias de Produtos</h2>
		<div class="clearfix">
	</div>
</div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Nome</th>
			<th>Criado em</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
 @forelse($categorias as $categoria)
 <tr>
			<td>{{$categoria->id}}</td>
			<td>{{$categoria->nome}}</td>
			<td>{{date('d/m/Y H:i:s', strtotime($categoria->created_at))}}</td>
			<td>
				<div class="btn-group">
					<a href="{{route('categorias.show', ['categoria' => $categoria->id])}}" class="btn btn-sm btn-primary">Editar</a>

                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Remover</a>

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

 {{$categorias->links()}}

 <!-- Modal -->
 <form action="{{route('categorias.destroy', ['categoria' => $categoria->id])}}" method="post">
    @csrf
    @method('DELETE')

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
 @endsection
