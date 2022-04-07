@extends('layouts.owner_default')

@section('Rese 店舗担当者管理画面')

@section('css')
@if(app('env')=='local')
<link rel="stylesheet" href="{{ asset('css/owner/mypage.css') }}">
@endif
<link rel="stylesheet" href="{{ secure_asset('css/owner/mypage.css') }}">
@endsection

@section('main')
<main class="owner">
  <div class="owner__name">
    <h2 class="owner__name__message">お疲れ様です。{{$item->name}}さん</h2>
  </div>
  <div class="shop">
    <img src="{{$item->shop->image_url}}" alt="{{$item->shop->name}}" class="shop__image">
    <div class="shop__content">
      <div class="shop__content__title">
        <p class="shop__content__title-name">{{$item->shop->name}}</p>
      </div>
      <div class="shop__content__tag">
        <p class="shop__content__tag-area">#{{$item->shop->area->name}}</p>
        <p class="shop__content__tag-genre">#{{$item->shop->genre->name}}</p>
      </div>
      <div class="shop__content__summary">
        <p class="shop__content__summary-detail">{{$item->shop->summary}}</p>
      </div>
      <div class="shop__button">
        <a href="/shop/update" class="shop__button__update">店舗情報更新</a>
      </div>
    </div>
  </div>
</main>

<main class="reservation">
  <div class="reservation__title">
    <h2 class="reservation__title__name">ご予約状況</h2>
  </div>
  <div class="reservation__contents">
    @if($reservations->count())
    @else
    <div class="message">
      <p class="message__none">ご予約はありません。</p>
    </div>
    @endif
    <table class="lists">
      <tr class="lists__title">
        <th class="lists__title__name">ユーザー名</th>
        <th class="lists__title__email">メールアドレス</th>
        <th class="lists__title__date">予約日</th>
        <th class="lists__title__time">予約時間</th>
        <th class="lists__title__people">予約人数</th>
      </tr>
      @foreach($reservations as $reservation)
      <tr class="lists__detail">
        <td class="lists__detail__name">{{$reservation->user->name}}</td>
        <td class="lists__detail__email">{{$reservation->user->email}}</td>
        <td class="lists__detail__date">{{$reservation->use_date}}</td>
        <td class="lists__detail__time">{{$reservation->use_time}}</td>
        <td class="lists__detail__people">{{$reservation->people}}</td>
      </tr>
      @endforeach
    </table>
  </div>
</main>
@endsection