@extends('layouts.admin_default')

@section('Rese ジャンル登録')

@section('css')
@if(app('env')=='local')
<link rel="stylesheet" href="{{ asset('css/genre_register.css') }}">
@endif
<link rel="stylesheet" href="{{ secure_asset('css/genre_register.css') }}">
@endsection

@section('main')
<main class="register">
  <div class="box">
    <div class="box__title">
      <p class="box__title__name">ジャンル登録</p>
    </div>
    <div class="box__content">
      <form action="/genre/register" method="post">
        @csrf
        <div class="box__content__form">
          <div class="form__error">
            @if($errors->has('name'))
            <p class="error-message">{{$errors->first('name')}}</p>
            @endif
          </div>
          <div class="form__text">
            <img class="form__text__image" src="../icon/フォークとナイフのお食事アイコン素材2.svg" alt="ジャンルアイコン">
            <input type="text" class="form__text__name" name="name" placeholder="ジャンル名" value="{{ old('name') }}">
          </div>
        </div>
        <div class="box__content__button">
          <input type="submit" class="form__button" value="ジャンル登録">
        </div>
      </form>
    </div>
  </div>
</main>
@endsection