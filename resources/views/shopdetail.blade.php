<!--飲食店詳細 -->
@extends('layouts.default')
@section('title','飲食店一覧')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shopdetail.css') }}">
@endsection


@section('main')
<main>
  <section>
    <img src="{{$items->image_url}}" alt="{{$items->name}}">
    <p>{{$items->name}}</p>
    <p>{{$items->area->name}}</p>
    <p>{{$items->genre->name}}</p>
    <p>{{$items->summary}}</p>
  </section>
  <aside>
    <p>予約</p>
    <form action="/reserve" method="post">
      @csrf
      <input type="date" name="date">
      <select name="input_time" value="">
        <option value="input_time">{{$items->open_time}}</option>
      </select>
      <select name="input_people">
        @for($people=1; $people<=10; $people++) <option value="{{$people}}">{{$people}}人</option>
          @endfor
      </select>
      <input type="submit" value="予約する">
    </form>

  </aside>
</main>
@endsection