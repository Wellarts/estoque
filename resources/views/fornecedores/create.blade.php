@extends('layouts.app')
@section('content')

<form name="personForm" id="personForm" class="form-horizontal" method="post" action=""
    data-city-url="{{ route('cidades') }}">
    @csrf
    <div class="form-group form-group-sm">
        <label class="control-label col-sm-2" for="state_id">Estado:</label>
      <div class="col-sm-8">
            <select class="form-control" name="state_id" id="state_id" onchange="myFunction()">
                @foreach($State as $uf)
                <option value="{{$uf->id}}">{{$uf->name}}</option>
            @endforeach
            </select>
      </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="control-label col-sm-2" for="city_id">Cidade:</label>
      <div class="col-sm-8">
            <select class="form-control" name="city_id" id="city_id">
            @foreach($City as $cid)
                <option value="{{$cid->id}}">{{$cid->name}}</option>
            @endforeach
            </select>
      </div>
    </div>
    <div>
        <button class="btn btn-lg btn-success float-end">Salvar</button>
     </div>
</form>

<script>
    function myFunction() {
        var x = document.getElementById("state_id").value;
        alert(x);

        $.ajax({
            url : "{{ route('cidades') }}",
            data: {
                'x': x,

            },
            success: function(data){
                $("#state_id").html(data);
            }
        });
   };
</script>

@endsection
