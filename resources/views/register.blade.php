<!-- 会員登録ページ　authファイルの中のregisterを参考にする -->
@extends('layouts.default')
@section('title','Rese会員登録')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection


@section('body')

<header class="system-header">
  <div class="header-top">
    <div class="menu" id="menu">
      <span class="menu__line--top"></span>
      <span class="menu__line--middle"></span>
      <span class="menu__line--bottom"></span>
    </div>
    <div class="menu-title">
      <a href="/" class="menu-title__name">Rese</a>
    </div>
  </div>
</header>

<main class="register">
  <div class="box">
    <div class="box__title">
      <p class="box__title__name">Registration</p>
    </div>
    <div class="box__content">
      <form action="/register" method="post">
        @csrf
        <div class="box__content__form">
          @if($errors->has('name'))
          <p class="error-message">{{$errors->first('name')}}</p>
          @endif
          <input type="text" class="form__name" name="name" placeholder="Username" value="{{ old('name') }}">
        </div>
        <div class="box__content__form">
          @if($errors->has('email'))
          <p class="error-message">{{$errors->first('email')}}</p>
          @endif
          <div class="form__email">
            <input type="text" class="form__email" name="email" placeholder="Email" value="{{ old('email') }}">
          </div>
        </div>
        <div class="box__content__form">
          @if($errors->has('password'))
          <p class="error-message">{{$errors->first('password')}}</p>
          @endif
          <div class="form__password">
            <input type="text" name="password" placeholder="Password" value="{{ old('password') }}">
          </div>
        </div>
        <div class="box__content__button">
          <input type="submit" value="登録">
        </div>
      </form>
    </div>
  </div>
</main>
<script src="{{ asset('js/main.js') }}"></script>
@endsection
