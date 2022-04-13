@extends('layouts.default')
@section('title','Rese 仮会員登録完了')

@section('css')
@if(app('env')=='local')
<link rel="stylesheet" href="{{ asset('css/user/evaluation_registered.css') }}">
@endif
<link rel="stylesheet" href="{{ secure_asset('css/user/evaluation_registered.css') }}">
@endsection


@section('main')
<main class="thanks">
  <div class="box">
    <p class="box__message">ご意見ありがとうございました。</p>
    <a href="/user/mypage" class="box__button">マイページに戻る</a>
  </div>
</main>

@endsection