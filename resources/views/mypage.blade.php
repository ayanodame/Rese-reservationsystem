@extends('layouts.default')
@section('title','Rese ログイン')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection


@section('main')

@if (Auth::check())
<p>{{$items->user->name}}さん</p>
<p>{{$items->shop->name}}</p>
<p>{{$items->use_date}}</p>
<p>{{$items->use_time}}</p>
<p>{{$items->people}}人</p>


@else
<p>ログインしてください</p>
@endif

@endsection