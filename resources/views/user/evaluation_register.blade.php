@extends('layouts.default')
@section('title','Rese お店評価')

@section('css')
@if(app('env')=='local')
<link rel="stylesheet" href="{{ asset('css/user/evaluation_register.css') }}">
@endif
<link rel="stylesheet" href="{{ secure_asset('css/user/evaluation_register.css') }}">
@endsection


@section('main')
<main class="evaluation">
  <p>{{$items->shop->id}}</p>
  <p>{{$items->user->id}}</p>
</main>


@endsection