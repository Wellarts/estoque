
<option value="">Selecione</option>
    @foreach($cities as $city)
        <option value="{{$city->id}}">{{$city->name}}</option>
    @endforeach
