@extends('layouts.default')
@section('title','Rese 予約変更')

@section('css')
@if(app('env')=='local')
<link rel="stylesheet" href="{{ asset('css/update.css') }}">
@endif
<link rel="stylesheet" href="{{ secure_asset('css/update.css') }}">
@endsection


@section('main')
<main class="update">
  <div class="before">
    <div class="before__title">
      <p class="before__title__name">変更前情報</p>
    </div>
    <div class="before__content">
      <table class="before__information">
        <tr class="before__information__shop">
          <th class="before__information__shop-title">Shop</th>
          <td class="before__information__shop-name">{{$items->shop->name}}</td>
        </tr>
        <tr class="before__information__date">
          <th class="before__information__date-title">Date</th>
          <td class="before__information__date-name">{{$items->use_date}}</td>
        </tr>
        <tr class="before__infomation__time">
          <th class="before__information__time-title">Time</th>
          <td class="before__information__time-name">{{$items->use_time}}</td>
        </tr>
        <tr class="before__information__number">
          <th class="before__information__number-title">Number</th>
          <td class="before__information__number-name">{{$items->people}}<span class="people__number">人</span></td>
        </tr>
      </table>
    </div>
  </div>
  <div class="icon">
    <img class="form__text__image" src="/icon/矢印アイコン　右2.svg" alt="→">
  </div>
  <div class="after">

    <!--時間のプルダウンリストを作成するための繰り返し文 -->
    <?php
    $reservedTimeList = array();
    $calcTime = date("H:i", strtotime($items->shop->open_time)); //開始時刻を定義
    $endTime = date("H:i", strtotime($items->shop->close_time)); //終了時刻を定義
    $lastOrderTime = date("H:i", strtotime('-30 minute', strtotime($endTime)));

    array_push($reservedTimeList, $calcTime); //$reservedTimeListの配列に開始時刻を追加
    while (true) {  //下記を繰り返します。
      $calcTime = date("H:i", strtotime('+30 minute', strtotime($calcTime)));
      //$calcTime＝30分ずつ足していく。
      if ($calcTime >= $lastOrderTime) {  //calcTimeがlastOrderTimeより大きい場合は下記を実行して繰り返しを終了。
        array_push($reservedTimeList, $lastOrderTime);
        //reservedTimeListの配列にendTimeの時間を追加。
        break;
      }

      array_push($reservedTimeList, $calcTime);
      //reservedTimeListに$calcTime(=30分ずつ足した時間)の配列を繰り返し追加する。
    }
    ?>
    <!--ここまで-->

    <div class="after__title">
      <p class="after__title__name">変更後情報</p>
    </div>
    <div class="after__content">
      <form action="/update" method="POST" class="update__form">
        @csrf
        <table class="after__information">
          <input type="hidden" name="id" value="{{$items->id}}">
          <tr class="after__information__shop">
            <th class="after__information__shop-title">Shop</th>
            <td class="after__information__shop-name">{{$items->shop->name}}</td>
          </tr>
          <tr class="after__information__date">
            <th class="after__information__date-title">Date</th>
            <td class="after__information__date-name"><input type="date" name="use_date" class="reservation__date" min="<?php $today = date("Y-m-d");
                                                                                                                        $tomorrow = date("Y-m-d", strtotime('+1 day', strtotime($today)));
                                                                                                                        print($tomorrow); ?>" value="{{ old('date')}}"></td>
          </tr>
          <tr class="after__information__time">
            <th class="after__information__time-title">Time</th>
            <td class="after__information__time-name"><select name="use_time" class="reservation__time">
                @foreach($reservedTimeList as $time)
                <option value="{{$time}}">{{$time}}</option>
                @endforeach
              </select></td>
          </tr>
          <tr class="after__information__number">
            <th class="after__information__number-title">Number</th>
            <td class="after__information__number-name"><select name="people" class="reservation__number">
                @for($people=1; $people<=10; $people++) <option value="{{$people}}">{{$people}}人</option>
                  @endfor
              </select></td>
          </tr>
        </table>
        <div class="after__button">
          <input type="submit" value="変更" class="update__button">
        </div>
    </div>
  </div>
</main>
@endsection