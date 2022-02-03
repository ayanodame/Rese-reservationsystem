<!-- マイページ表示用 -->
@extends('layouts.default')
@section('title','飲食店一覧')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection


@section('body')
<!--保存用 検索用-->
<form action="/" method="get">
@csrf
<div class="select-area">
  <input type="radio" name="input_area">
  <i class="toggle cp_sl07_arrowdown"></i>
  <i class="toggle cp_sl07_arrowup"></i>
  <span class="selectlabel">All area</span>
  @foreach($areas as $area)
  <label class="option">
    <input type="radio" name="input_area" value="{{$area->id}}">
    <span class="selectlabel_area">{{$area->name}}</span>
  </label>
</div>
@endforeach
<div class="select-genre">
  <input type="radio" name="input_genre">
  <i class="toggle cp_sl07_arrowdown"></i>
  <i class="toggle cp_sl07_arrowup"></i>
  <span class="selectlabel">All genre</span>
  @foreach($genres as $genre)
  <label class="option">
    <input type="radio" name="input_genre" value="{{$genre->id}}">
    <span class="selectlabel_genre">{{$genre->name}}</span>
  </label>
  @endforeach
</div>
<div class="search-form__keyword">
  <input type="text" class="form__keyword" name="input_keyword" value="{{$keywords}}" placeholder="Search...">
</div>
</form>


<!--飲食店一覧および検索結果-->
@if(@isset($shops))
@foreach($shops as $shop)
<p>{{$shop->name}}</p>
<p>{{$shop->area->name}}</p>
<p>{{$shop->genre->name}}</p>
<p>詳しく見る</p>
@endforeach
@endif