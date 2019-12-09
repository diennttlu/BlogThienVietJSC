@foreach ($districts as $key => $district)
    <option value="{{$district->id}}">{{$district->name}}</option>
@endforeach