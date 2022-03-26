@extends('layouts.default')
@section('title','Rese 会員登録完了')

@section('css')
@if(app('env')=='local')
<link rel="stylesheet" href="{{ asset('css/prethanks.css') }}">
@endif
<link rel="stylesheet" href="{{ secure_asset('css/prethanks.css') }}">
@endsection


@section('main')
<main class="thanks">
  <div class="box">
    <p class="box__message">会員登録完了しました。</p>
    <a class="box__button" href="/mypage">マイページへ</a>
  </div>
</main>

@endsection