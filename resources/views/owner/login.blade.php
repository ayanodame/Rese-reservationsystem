@extends('layouts.manage_default')
@section('title','Rese オーナーログイン')

@section('css')
@if(app('env')=='local')
<link rel="stylesheet" href="{{ asset('css/user/login.css') }}">
@endif
<link rel="stylesheet" href="{{ secure_asset('css/user/login.css') }}">
@endsection

@section('main')

<main class="login">
  <div class="box">
    <div class="box__title">
      <p class="box__title__name">Login</p>
    </div>
    <div class="box__content">
      <div class="box__content__message">

      </div>
      <form action="/owner/login" method="post">
        @csrf
        <div class="box__content__form">
          <div class="form__error">
            @if($errors->has('email'))
            <p class="error-message">{{$errors->first('email')}}</p>
            @endif
          </div>
          <div class="form__text">
            <img class="form__text__image" src="../icon/メールの無料アイコン.svg" alt="メールアイコン">
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
            <img class="form__text__image" src="../icon/カギアイコン.svg" alt="カギアイコン">
            <input type="password" class="form__text__password" name="password" placeholder="Password" value="{{ old('password') }}">
          </div>
        </div>
        <div class="box__content__button">
          <input type="submit" class="form__button" value="ログイン">
        </div>
      </form>
    </div>
  </div>
</main>
@endsection