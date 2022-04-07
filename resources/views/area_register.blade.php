@extends('layouts.admin_default')

@section('Rese エリア名登録')

@section('css')
@if(app('env')=='local')
<link rel="stylesheet" href="{{ asset('css/area_register.css') }}">
@endif
<link rel="stylesheet" href="{{ secure_asset('css/area_register.css') }}">
@endsection

@section('main')
<main class="register">
  <div class="box">
    <div class="box__title">
      <p class="box__title__name">エリア登録</p>
    </div>
    <div class="box__content">
      <form action="/area/register" method="post">
        @csrf
        <div class="box__content__form">
          <div class="form__error">
            @if($errors->has('name'))
            <p class="error-message">{{$errors->first('name')}}</p>
            @endif
          </div>
          <div class="form__text">
            <img class="form__text__image" src="../icon/日本地図のアイコン.svg" alt="地図アイコン">
            <input type="text" class="form__text__name" name="name" placeholder="エリア名" value="{{ old('name') }}">
          </div>
        </div>
        <div class="box__content__button">
          <input type="submit" class="form__button" value="エリア登録">
        </div>
      </form>
    </div>
  </div>
</main>
@endsection