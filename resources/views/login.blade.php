@extends('layouts.default')
@section('title','Rese ログイン')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('main')

<!--<input type="text" name="email">
<input type="password" name="password">
<input type="submit" value="送信">
</form> -->


<main class="login">
  <div class="box">
    <div class="box__title">
      <p class="box__title__name">Login</p>
    </div>
    <div class="login__message">
      <p>{{$text}}</p>
    </div>
    <div class="box__content">
      <form action="/login" method="post">
        @csrf
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
          <input type="submit" class="form__button" value="ログイン">
        </div>
      </form>
    </div>
  </div>
</main>
@endsection