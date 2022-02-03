@extends('layouts.default')
@section('title','飲食店一覧')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/shoplist.css') }}">
@endsection

@section('search')
<div class="search-form">
    <form action="/" method="get">
      @csrf
      <div class="select-wrap-area">
        <select class="form__area" name="input_area" value="{{$areaId}}" onchange="submit(this.form)">
          <option name="input_area" value="">All area</option>
          @foreach($areas as $area)
          <option name="input_area" value="{{$area->id}}" <?php ($area->id)==$areaId ? print "selected" : print ""; ?>>{{$area->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="select-wrap-genre">
        <select class="form__genre" name="input_genre" value="{{$genreId}}" onchange="submit(this.form)">
          <option name="input_genre" value="">All genre</option>
          @foreach($genres as $genre)
          <option name="input_genre" value="{{$genre->id}}" <?php ($genre->id)==$genreId ? print "selected" : print ""; ?>>{{$genre->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="search-form__keyword">
        <input type="text" class="form__keyword" name="input_keyword" value="{{$keywords}}" placeholder="Search...">
      </div>
    </form>
  </div>
@endsection

@section('main')

<main class="system-shoplist">
  <section class="shoplist">
    @if($shops->count())
    @foreach($shops as $shop)
    <div class="shop-card">
      <div class="card__image">
        <img src="{{$shop->image_url}}" alt="{{$shop->name}}" class="card__image__shop">
      </div>
      <div class="card__text">
        <p class="card__text__name">{{$shop->name}}</p>
        <div class="text__hushtag-list">
          <p class="text__hushtag-list__area"><span class="hushtag">#</span>{{$shop->area->name}}</p>
          <p class="text__hushtag-list__genre"><span class="hushtag">#</span>{{$shop->genre->name}}</p>
        </div>
      </div>
      <div class="card__button">
        <a href="店舗詳細ページへ" class="card__button_shop-detail">詳しくみる</a>
      </div>
    </div>
    @endforeach
    @else
    <div class="message">
      <p class="message__none">ご希望のお店がありませんでした。条件を変えて再検索してください。</p>
    </div>
    @endif
  </section>
</main>
@endsection