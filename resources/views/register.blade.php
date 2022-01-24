<!-- 会員登録ページ　authファイルの中のregisterを参考にする -->
@extends('layouts.default')
@section('title','Rese会員登録')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection


@section('body')

<p>会員登録ページ</p>

@if($errors->has('name'))
<p class="error-message">{{$errors->first('name')}}</p>
@endif
@if($errors->has('email'))
<p class="error-message">{{$errors->first('email')}}</p>
@endif
@if($errors->has('password'))
<p class="error-message">{{$errors->first('password')}}</p>
@endif

<form action="/register" method="post">
  @csrf
  <input type="text" name="name" placeholder="Username" value="{{ old('name') }}">
  <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
  <input type="text" name="password" placeholder="Password" value="{{ old('password') }}">
  <input type="submit" value="登録">
</form>

@endsection
