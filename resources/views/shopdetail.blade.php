<!--飲食店詳細 -->
@extends('layouts.default')
@section('title','飲食店一覧')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shopdetail.css') }}">
@endsection

@section('side')
<div class="reservation">
  <p class="reservation__title">予約</p>
  <form action="/reserve" method="post" class="reservation__form" id="reserveForm">
    @csrf
    <input type="hidden" name="name" value="{{$items->id}}">
    @if (Auth::check())
    <input type="hidden" name="user" value="{{$user->id}}">
    @endif
    <input type="date" name="date" class="reservation__date">

    <!--時間のプルダウンリストを作成するための繰り返し文 -->
    <?php
    $reservedTimeList = array();
    $calcTime = date("H:i", strtotime($items->open_time)); //開始時刻を定義
    $endTime = date("H:i", strtotime($items->close_time)); //終了時刻を定義

    array_push($reservedTimeList, $calcTime); //$reservedTimeListの配列に開始時刻を追加
    while (true) {  //下記を繰り返します。
      $calcTime = date("H:i", strtotime('+30 minute', strtotime($calcTime)));
      //$calcTime＝30分ずつ足していく。
      if ($calcTime >= $endTime) {  //calcTimeがendTimeより大きい場合は下記を実行して繰り返しを終了。
        array_push($reservedTimeList, $endTime);
        //reservedTimeListの配列にendTimeの時間を追加。
        break;
      }

      array_push($reservedTimeList, $calcTime);
      //reservedTimeListに$calcTime(=30分ずつ足した時間)の配列を繰り返し追加する。
    }
    ?>
    <!--ここまで-->

    <select name="time" class="reservation__time">
      @foreach($reservedTimeList as $time)
      <option value="{{$time}}">{{$time}}</option>
      @endforeach
    </select>
    <select name="number" class="reservation__number">
      @for($people=1; $people<=10; $people++) <option value="{{$people}}">{{$people}}人</option>
        @endfor
    </select>

    <div class="reservation__check" id="reserveCheck">
      <!--ここ、表タグにすること-->
      <div class="check__shop">
        <p class="check__shop__title">Shop:</p>
        <p class="check__shop__output" id="shopName">{{$items->name}}</p>
      </div>
      <div class="check__date">
        <p class="check__date__title">Date:</p>
        <p class="check__date__output" id="shopDate"></p>
      </div>
      <div class="check__time">
        <p class="check__time__title">Time:</p>
        <p class="check__time__output" id="shopTime"></p>
      </div>
      <div class="check__number">
        <p class="check__number__title">Number:</p>
        <p class="check__number__output" id="shopNumber"></p><span class="check__number__people">人</span>
      </div>


    </div>

    <input type="submit" value="予約する" class="reservation__button">
  </form>
</div>
@endsection

@section('main')
<main class="system-reservation">
  <section class="shopdetail">
    <div class="infomation">
      <div class="infomation__title">
        <a href="/" class="infomation__title__button">&lt;</a>
        <p class="infomation__top__shopname">{{$items->name}}</p>
      </div>
      <div class="infomation__image">
        <img src="{{$items->image_url}}" alt="{{$items->name}}" class="infomation__image__shop">
      </div>
      <div class="infomation__tag">
        <p class="infomation__tag__area"><span class="hashtag">#</span>{{$items->area->name}}</p>
        <p class="infomation__tag__genre"><span class="hashtag">#</span>{{$items->genre->name}}</p>
      </div>
      <div class="infomation__content">
        <p class="infomation__content__summary">{{$items->summary}}</p>
      </div>
    </div>
  </section>
</main>
@endsection