@extends('layouts.default')
@section('title','Rese ログイン')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('main')
<p>{{$text}}</p>
<form action="/login" method="post">
  @csrf
  <input type="text" name="email">
  <input type="password" name="password">
  <input type="submit" value="送信">
</form>
@endsection