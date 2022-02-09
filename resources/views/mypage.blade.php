@extends('layouts.default')
@section('title','Rese ログイン')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection


@section('main')

@if (Auth::check())
<p>{{$user->name}}さん、こんにちは</p>

@else
<p>ログインしてください</p>
@endif

@endsection