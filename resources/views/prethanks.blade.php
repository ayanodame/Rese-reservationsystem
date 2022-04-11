@extends('layouts.default')
@section('title','Rese 仮会員登録完了')

@section('css')
@if(app('env')=='local')
<link rel="stylesheet" href="{{ asset('css/prethanks.css') }}">
@endif
<link rel="stylesheet" href="{{ secure_asset('css/prethanks.css') }}">
@endsection


@section('main')
<main class="thanks">
  <div class="box">
    <p class="box__message">アカウント仮登録が完了しました。</p>
    <p class="box__message__detail">登録したメールアドレスに届いたURLからアクセスし、<br>本登録を完了させてください。</p>
  </div>
</main>

@endsection