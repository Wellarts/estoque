@extends('layouts.app')
@section('content')

<form action="{{route('produtos.store')}}" method="post">
    @csrf
     <div class="form-group">
        <label>Nome</label>
        <input type="text" name="name" class="form-control" value="{{ old('name')}}">
        <label>Estado</label>
        <select class="form-select" aria-label="Default select example">
            @foreach($State as $uf)
                <option value="{{$uf->id}}">{{$uf->name}}</option>
            @endforeach
        </select>
        <label>Cidade</label>
        <select class="form-select" aria-label="Default select example">
            @foreach($City as $cid)
                <option value="{{$cid->id}}">{{$cid->name}}</option>
            @endforeach
        </select>
        <label>Telefone</label>
        <input type="text" name="telefone" class="form-control" value="{{ old('telefone')}}">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="{{ old('email')}}">
    </div>
    <div>
        <button class="btn btn-lg btn-success float-end">Salvar</button>
     </div>
</form>
@endsection
