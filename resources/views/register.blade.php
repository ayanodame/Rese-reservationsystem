<!-- 会員登録ページ　authファイルの中のregisterを参考にする -->
@extends('layouts.default')
@section('title','Rese 会員登録')

@section('css')
@if(app('env')=='local')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endif
<link rel="stylesheet" href="{{ secure_asset('css/register.css') }}">
@endsection


@section('main')

<main class="register">
  <div class="box">
    <div class="box__title">
      <p class="box__title__name">Registration</p>
    </div>
    <div class="box__content">
      <form action="/register" method="post">
        @csrf
        <div class="box__content__form">
          <div class="form__error">
            @if($errors->has('name'))
            <p class="error-message">{{$errors->first('name')}}</p>
            @endif
          </div>
          <div class="form__text">
            <img class="form__text__image" src="icon/人物アイコン.svg" alt="人物アイコン">
            <input type="text" class="form__text__name" name="name" placeholder="Username" value="{{ old('name') }}">
          </div>
        </div>
        <div class="box__content__form">
          <div class="form__error">
            @if($errors->has('email'))
            <p class="error-message">{{$errors->first('email')}}</p>
            @endif
          </div>
          <div class="form__text">
            <img class="form__text__image" src="icon/メールの無料アイコン.svg" alt="メールアイコン">
            <input type="text" class="form__text__email" name="email" placeholder="Email" value="{{ old('email') }}">
          </div>
        </div>
        <div class="box__content__form">
          <div class="form__error">
            @if($errors->has('password'))
            <p class="error-message">{{$errors->first('password')}}</p>
            @endif
          </div>
          <div class="form__text">
            <img class="form__text__image" src="icon/カギアイコン.svg" alt="カギアイコン">
            <input type="text" class="form__text__password" name="password" placeholder="Password" value="{{ old('password') }}">
          </div>
        </div>
        <div class="box__content__button">
          <input type="submit" class="form__button" value="登録">
        </div>
      </form>
    </div>
  </div>
</main>
@endsection