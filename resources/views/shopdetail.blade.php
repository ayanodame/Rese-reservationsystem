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
    <input type="hidden" name="shop_id" value="{{$items->id}}">
    @if($errors->has('use_date'))
    <p class="error-message">{{$errors->first('use_date')}}</p>
    @endif
    <input type="date" name="use_date" class="reservation__date" min="<?php $today = date("Y-m-d");
                                                                      $tomorrow = date("Y-m-d", strtotime('+1 day', strtotime($today)));
                                                                      print($tomorrow); ?>">

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

    @if($errors->has('use_time'))
    <p class="error-message">{{$errors->first('use_time')}}</p>
    @endif
    <div class="reservation__wrap-time">
      <select name="use_time" class="reservation__time">
        @foreach($reservedTimeList as $time)
        <option value="{{$time}}">{{$time}}</option>
        @endforeach
      </select>
    </div>

    @if($errors->has('people'))
    <p class="error-message">{{$errors->first('people')}}</p>
    @endif
    <div class="reservation__wrap-number">
      <select name="people" class="reservation__number">
        @for($people=1; $people<=10; $people++) <option value="{{$people}}">{{$people}}人</option>
          @endfor
      </select>
    </div>

    <table class="reservation__check" id="reserveCheck">
      <tr class="check__shop">
        <th class="check__shop__title">
          <p class="check__shop__title-word">Shop</p>
        </th>
        <td class="check__shop__output">
          <p class="check__shop__output-word" id="shopName">{{$items->name}}</p>
        </td>
      </tr>
      <tr class="check__date">
        <th class="check__date__title">
          <p class="check__date__title-word">Date</p>
        </th>
        <td class="check__date__output">
          <p class="check__date__output-word" id="shopDate"></p>
        </td>
      </tr>
      <tr class="check__time">
        <th class="check__time__title">
          <p class="check__time__title-word">Time</p>
        </th>
        <td class="check__time__output">
          <p class="check__time__output-word" id="shopTime"></p>
        </td>
      </tr>
      <tr class="check__number">
        <th class="check__number__title">
          <p class="check__number__title-word">Number</p>
        </th>
        <td class="check__number__output">
          <p class="check__number__output-word" id="shopNumber"></p><span class="check__number__people">人</span>
        </td>
      </tr>
    </table>

    @if (Auth::check())
    <input type="hidden" name="user_id" value="{{$user->id}}">
    <input type="submit" value="予約する" class="reservation__button">
    @else
    <p class="reservation__login-message">予約登録にはログインが必要です</p>
    <a href="/login" class="reservation__login-button">ログインする</a>
    @endif

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