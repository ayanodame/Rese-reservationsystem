<!-- 飲食店詳細ページ用 -->
<form action="/search" method="post">
@csrf
<select class="input_area" name="input_area" value="">
  <option name="input_area" value="">All area</option>
  @foreach($areas as $area)
  <option name="input_area" value="{{$area->id}}">{{$area->name}}</option>
  @endforeach
</select>
<input type="text" class="input_name" name="input_name" value="{{$name}}" placeholder="Search...">
</form>




<p>飲食店詳細ページ</p>
@if(@isset($results))
@foreach($results as $result)
<p>{{$result->name}}</p>
<p>{{$result->area->name}}</p>
<p>{{$result->genre->name}}</p>
<p>詳しく見る</p>
@endforeach
@endif