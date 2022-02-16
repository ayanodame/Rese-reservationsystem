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
      <input type="hidden" name="name" value="{{$items->id}}">
      <input type="date" name="date">

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

      <select name="time" value="">
        @foreach($reservedTimeList as $time)
        <option value="{{$time}}">{{$time}}</option>
        @endforeach
      </select>
      <select name="people">
        @for($people=1; $people<=10; $people++) <option value="{{$people}}">{{$people}}人</option>
          @endfor
      </select>
      <p>{{$items->name}}</p>
      <input type="submit" value="予約する">
    </form>

  </aside>
</main>
@endsection