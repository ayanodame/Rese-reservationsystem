<!-- 飲食店詳細ページ用 -->
<p>飲食店詳細ページ</p>
@foreach($items as $item)
<p>{{$item->name}}</p>
<p>{{$item->area->name}}</p>
<p>{{$item->genre->name}}</p>
<img src="{{$item->image_url}}" alt="{{$item->name}}">
<p>詳しく見る</p>
@endforeach