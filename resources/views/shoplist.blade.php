@extends('layouts.default')
@section('title','飲食店一覧')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/shoplist.css') }}">
@endsection


@section('body')

<header class="systemHeader">
  <div class="header_top">
    <div class="menu">
      <span class="menu__line--top"></span>
      <span class="menu__line--middle"></span>
      <span class="menu__line--bottom"></span>
    </div>
    <div class="menu_title">
      <p class="systemName">Rese</p>
    </div>
  </div>
  <div class="searchForm">
    <form action="/" method="get">
      @csrf
      <select class="form_area" name="input_area" value="">
        <option name="input_area" value="">All area</option>
        @foreach($areas as $area)
        <option name="input_area" value="{{$area->id}}">{{$area->name}}</option>
        @endforeach
      </select>
      <select class="form_genre" name="input_genre" value="">
        <option name="input_genre" value="">All genre</option>
        @foreach($genres as $genre)
        <option name="input_genre" value="{{$genre->id}}">{{$genre->name}}</option>
        @endforeach
      </select>
      <input type="text" class="form_keyword" name="input_keyword" value="" placeholder="Search...">
    </form>
  </div>
</header>
<main class="systemShoplist">
<section class="shopList">
  @foreach($shops as $shop)
  <div class="shopCard">
    <div class="card_image">
      <img src="{{$shop->image_url}}" alt="{{$shop->name}}" class="shop_image">
    </div>
    <div class="card_text">
      <p class="text_name">{{$shop->name}}</p>
      <div class="text_hushtagList">
        <p class="area"><span class="hushtag">#</span>{{$shop->area->name}}</p>
        <p class="genre"><span class="hushtag">#</span>{{$shop->genre->name}}</p>
      </div>
    </div>
    <div class="card_button">
      <a href="店舗詳細ページへ" class="shopDetail">詳しくみる</a>
    </div>
  </div>
  @endforeach
</section>
</main>
@endsection