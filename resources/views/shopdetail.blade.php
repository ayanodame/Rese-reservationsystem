<!--検索用 -->
<form action="/search" method="post">
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
<input type="text" class="input_name" name="input_name" value="{{$name}}" placeholder="Search...">
</form>


<!--飲食店一覧および検索結果-->
@if(@isset($results))
@foreach($results as $result)
<p>{{$result->name}}</p>
<p>{{$result->area->name}}</p>
<p>{{$result->genre->name}}</p>
<p>詳しく見る</p>
@endforeach
@else
@foreach($items as $item)
<p>{{$item->name}}</p>
<p>{{$item->area->name}}</p>
<p>{{$item->genre->name}}</p>
<img src="{{$item->image_url}}" alt="{{$item->name}}">
<p>詳しく見る</p>
@endforeach
@endif