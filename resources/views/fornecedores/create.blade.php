@extends('layouts.app')

@section('content')

<form name="personForm" id="personForm" class="form-horizontal" method="post" action="{{ route('fornecedores.store') }}"
data-grupos-url="{{ route('load_cidades') }}">
@csrf

    <div class="my-3">
        <label class="label">Nome Completo/Razaão Social/Nome Fantasia</label>
        <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" aria-label="Nome" aria-describedby="basic-addon1">
    </div>
     <div class="my-3">
        <label class="label">Telefone</label>
        <input type="text" id="telefone" name="telefone" class="form-control" placeholder="(00)00000-0000" aria-label="telefone" aria-describedby="basic-addon1">
    </div>
    <div class="my-3">
        <label class="label">Telefone</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="basic-addon1">
    </div>
    <div class="row">
     <div class="form-group col-sm-4" >
        <div class="col-sm-8">
            <label for="floatingInputGrid">Estado</label>
                <select class="form-select" name="idFkEstado" id="estado_id">
                    <option value="">Selecione</option>
                        @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                </select>
        </div>
    </div>
    <div class="form-group col-sm-4 ">
        <div class="col-sm-8">
            <label for="Cidade">Cidade</label>
                <select class="form-select" name="idFkCidade" id="cidade_id">
                    <option value="">Selecione</option>
                        @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                </select>
            </div>
    </div>
   </div>
    <div>
        <button class="btn btn-lg btn-success float-end">Salvar</button>
    </div>


</form>

<script type="text/javascript">

// CARREGA ESTADOS E CIDADES

    $(document).ready(function(){
        $("#estado_id").change(function(){
            const url = $('#personForm').attr("data-grupos-url");
            stateId = $(this).val();
            $.ajax({
                url : url,
                data: {
                    'estado_id': stateId,
                },
                success: function(data){
                    $("#cidade_id").html(data);
                }
            });
        });
    });

    // INCLUSÃO DE MÁSCARAS ***

    $(document).ready(function(){
        console.log('teste');
    $('#telefone').mask('(00)00000-0000')
});



</script>



@endsection
