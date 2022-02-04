@extends('layouts.default')
@section('title','Rese ログイン')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('main')
<p>{{$text}}</p>
<form action="/login" method="post">
@csrf
<input type="text" name="email"></td>
<input type="password" name="password"></td>
<input type="submit" value="送信"></td>
</form>
@endsection