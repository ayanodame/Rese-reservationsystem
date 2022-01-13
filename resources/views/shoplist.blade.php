<!-- 飲食店一覧ページ用 -->
<form action="/" method="get">
@csrf
<select class="input_area" name="input_area" value="">
  <option name="input_area" value="">All area</option>
  @foreach($areas as $area)
  <option name="input_area" value="{{$area->id}}">{{$area->name}}</option>
  @endforeach
</select>
<select class="input_genre" name="input_genre" value="">
  <option name="input_genre" value="">All genre</option>
  @foreach($genres as $genre)
  <option name="input_genre" value="{{$genre->id}}">{{$genre->name}}</option>
  @endforeach
</select>
<input type="text" class="input_name" name="input_name" value="" placeholder="Search...">
</form>

@foreach($shops as $shop)
<p>{{$shop->name}}</p>
<p>{{$shop->area->name}}</p>
<p>{{$shop->genre->name}}</p>
@endforeach