            @foreach($City as $cid)
                <option value="{{$cid->id}}">{{$cid->name}}</option>
            @endforeach
