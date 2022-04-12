@extends('layouts.default')
@section('title','Rese 会員登録完了')

@section('css')
@if(app('env')=='local')
<link rel="stylesheet" href="{{ asset('css/user/thanks.css') }}">
@endif
<link rel="stylesheet" href="{{ secure_asset('css/user/thanks.css') }}">
@endsection


@section('main')
<main class="thanks">
  <div class="box">
    <p class="box__message">会員登録完了しました。</p>
    <a class="box__button" href="/user/mypage">マイページへ</a>
  </div>
</main>

@endsection