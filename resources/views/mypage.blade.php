@extends('layouts.default')
@section('title','Rese マイページ')

@section('css')
@if(app('env')=='local')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endif
<link rel="stylesheet" href="{{ secure_asset('css/mypage.css') }}">
@endsection


@section('main')

<main class="mylist">
  <section class="reservation">
    <h2 class="reservation__title">予約状況</h2>
    @if($reservations->count())
    <?php $number = 1; ?>
    @foreach($reservations as $reservation)
    <div class="reservation__card">
      <div class="reservation__card__header">
        <div class="reservation__card__title">
          <img src="/icon/シンプルな丸時計のアイコン色変え.svg" alt="時計" class="reservation__image">
          <p class="reservation__word">予約<?php print $number++; ?></p>
        </div>

        <form action="/delete" action="get">
          @csrf
          <input type="hidden" name="id" value="{{$reservation->id}}">
          <button class="delete__button">
            <img src="/icon/やや太いバツのアイコン2.svg" alt="削除" class="delete__image">
          </button>
        </form>
      </div>
      <table class="reservation__card__check">
        <tr class="check__shop">
          <th class="check__shop__title">
            <p class="check__shop__title-word">Shop</p>
          </th>
          <td class="check__shop__output">
            <p class="check__shop__output-word">
              {{$reservation->shop->name}}
            </p>
          </td>
        </tr>
        <tr class="check__date">
          <th class="check__date__title">
            <p class="check__date__title-word">Date</p>
          </th>
          <td class="check__date__output">
            <p class="check__date__output-word">{{$reservation->use_date}}
            </p>
          </td>
        </tr>
        <tr class="check__time">
          <th class="check__time__title">
            <p class="check__time__title-word">Time</p>
          </th>
          <td class="check__time__output">
            <p class="check__time__output-word">
              <?php $useTime = date("H:i", strtotime($reservation->use_time));
              print $useTime; ?></p>
          </td>
        </tr>
        <tr class="check__number">
          <th class="check__number__title">
            <p class="check__number__title-word">Number</p>
          </th>
          <td class="check__number__output">
            <p class="check__number__output-word">{{$reservation->people}}<span class="check__number__people">人</span></p>
          </td>
        </tr>
      </table>
    </div>
    @endforeach
    @else
    <div class="message">
      <p class="message__none">予約予定がありません</p>
    </div>
    @endif
  </section>

  <section class="likes">
    <div class="user">
      <h1 class="user-name">{{$user->name}}さん</h1>
    </div>
    <h2 class="likes__title">お気に入り店舗</h2>
    <div class="likeslist">
      @if($likes->count())
      @foreach($likes as $like)
      <div class="shop-card">
        <div class="card__image">
          <img src="{{$like->shop->image_url}}" alt="{{$like->shop->name}}" class="card__image__shop">
        </div>
        <div class="card__text">
          <p class="card__text__name">{{$like->shop->name}}</p>
          <div class="text__hushtag-list">
            <p class="text__hushtag-list__area"><span class="hushtag">#</span>{{$like->shop->area->name}}</p>
            <p class="text__hushtag-list__genre"><span class="hushtag">#</span>{{$like->shop->genre->name}}</p>
          </div>
        </div>
        <div class="card__button">
          <a href="/detail/{{$like->shop->id}}" class="card__button__shop-detail">詳しくみる</a>
          <div class="card__like">
            <form action="/unlike" action="get" 　class="like__form">
              @csrf
              <input type="hidden" name="shop_id" value="{{$like->shop->id}}">
              <button class="like__button">
                <img src="/icon/ハートのマーク赤色.svg"" alt=" いいね" class="like__image">
              </button>
            </form>
          </div>
        </div>
      </div>
      @endforeach
      @else
      <div class="message">
        <p class="message__none">お気に入り登録のお店がありません</p>
      </div>
      @endif
    </div>
  </section>
</main>

@endsection