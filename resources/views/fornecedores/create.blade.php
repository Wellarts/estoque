@extends('layouts.app')

@section('content')

<form name="personForm" id="personForm" class="form-horizontal" method="post" action="">

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label for="name">Estado</label>
            <select class="custom-select" placeholder="Estado" id="uf" name="uf" required>
                @foreach ($states as $state)
                    <option value="{{ $state->id }}" @selected(isset($setup) ? $setup->uf == $state->id : old('uf') == $state->id || $state->id == 16)>
                        {{ $state->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="name">Cidade</label>
            <select class="custom-select" placeholder="Cidade" id="cidade" name="cidade" required>

            </select>
        </div>
    </div>
</div>


</form>

<script type="text/javascript">
    $(function() {
        //Carrega todas as cidades
        const cities = {!! $cities !!};

        //Função quando o estado mudar
        $('#uf').change(function() {
            LoadCities($(this).val());
            //alert('teste :'+cities);


        });
        @isset($client)

            //Execução inicial do script
            LoadCities({{ $client->uf }}, {{ $client->cidade }});

        @endisset
        @empty($client)
            LoadCities(16, 1565);
        @endempty

        //Função de carregar as cidades com base no id do estado, podendo receber o id da cidade
        function LoadCities(id_state, id_city = null) {
            //Filtra as cidades para o estado selecionado
            const cities_of_state = cities.filter((city) => {
                return city.state_id == id_state;
            });
            //Desabilita o select de cidades
            $('#cidade').prop('readonly', true);
            //Remove todos os <options> de cidades
            $('#cidade').empty();

            //Ordena em ordem alfabetica pelo nome da cidade
            cities_of_state.sort(function(a, b) {

                if (a.title < b.title) {
                    return -1;
                }
                if (a.title > b.title) {
                    return 1;
                }
                return 0;
            });

            //Faz o map para adicionar os <options>
            cities_of_state.map((city) => {
                if (city.id == id_city) selected = 'selected';

                else selected = '';
                $('#cidade').append("<option value='" + city.id + "' " + selected + ">" + city.name +"</option>");

            });
            //Reabilita o select de cidades
            $('#cidade').prop('readonly', false);
        }
    });


</script>

@endsection
