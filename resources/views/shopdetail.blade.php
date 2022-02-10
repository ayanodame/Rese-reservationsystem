<!--飲食店詳細 -->
@extends('layouts.default')
@section('title','飲食店一覧')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shopdetail.css') }}">
@endsection


@section('main')
<img src="{{$item->image_url}}" alt="{{$item->name}}">
<p>{{$item->name}}</p>
<p>{{$item->area->name}}</p>
<p>{{$item->genre->name}}</p>
<p>{{$item->summary}}</p>
</section>
</main>
@endsection