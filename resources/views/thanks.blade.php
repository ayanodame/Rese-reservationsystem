<!-- サンクスページ表示 -->
@extends('layouts.default')
@section('title','Rese会員登録完了')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection


@section('main')
  <main class="thanks">
    <div class="box">
      <p class="box__message">会員登録ありがとうございます</p>
      <a class="box__button" href="/login">ログインする</a>
    </div>
  </main>

@endsection