<!-- 飲食店詳細ページ用 -->
<form action="/search" method="post">
@csrf
<select name="area">
<option value="">All area</option>
@foreach($areas as $area)
<option value="{{$area->name}}">{{$area->name}}</option>
@endforeach
</select>
<select name="genre">
<option value="">All genre</option>
@foreach($genres as $genre)
<option value="{{$genre->name}}">{{$genre->name}}</option>
@endforeach
</select>
<input type="text" name="">
</form>
<p>飲食店詳細ページ</p>
@foreach($items as $item)
<p>{{$item->name}}</p>
<p>{{$item->area->name}}</p>
<p>{{$item->genre->name}}</p>
<img src="{{$item->image_url}}" alt="{{$item->name}}">
<p>詳しく見る</p>
@endforeach