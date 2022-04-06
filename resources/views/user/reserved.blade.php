<!-- 予約完了ページ用　-->
@extends('layouts.default')
@section('title','Rese 予約完了')

@section('css')
@if(app('env')=='local')
<link rel="stylesheet" href="{{ asset('css/reserved.css') }}">
@endif
<link rel="stylesheet" href="{{ secure_asset('css/reserved.css') }}">
@endsection


@section('main')
<main class="thanks">
  <div class="box">
    <p class="box__message">ご予約ありがとうございます</p>
    <a class="box__button" href="javascript:history.back()">戻る</a>
  </div>
</main>

@endsection