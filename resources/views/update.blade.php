@extends('layouts.default')
@section('title','Rese 予約変更')

@section('css')
@if(app('env')=='local')
<link rel="stylesheet" href="{{ asset('css/update.css') }}">
@endif
<link rel="stylesheet" href="{{ secure_asset('css/update.css') }}">
@endsection


@section('main')
<section class="reservation">
  <div class="reservation__title">
    <h1 class="reservation__title__content">変更情報</h1>
  </div>
  <form action="/update" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$items->id}}">
    <table class="change">
      <tr>
        <th class="shop__title">Shop</th>
        <td class="shop__name">{{$items->shop->name}}</td>
      </tr>
      <th class="date__title">Date</th>
      <td class="date__name"><input type="date" name="use_date" class="reservation__date" min="<?php $today = date("Y-m-d");
                                                                                                $tomorrow = date("Y-m-d", strtotime('+1 day', strtotime($today)));
                                                                                                print($tomorrow); ?>" id="inputDate" value="{{ old('date')}}"></td>
      <tr>
        <th class="people__title">People</th>
        <td class="people name"><select name="people" class="reservation__number">
            @for($people=1; $people<=10; $people++) <option value="{{$people}}">{{$people}}人</option>
              @endfor
          </select></td>
      </tr>
      <tr>
        <th class="time__title">Time</th>
        <td class="time__name"><select name="use_time" class="reservation__time">
            <option value="18:00">18:00</option>
            <option value="18:30">18:30</option>
            <option value="19:00">19:00</option>
            <option value="19:30">19:30</option>
            <option value="20:00">20:00</option>
          </select></td>
      </tr>
    </table>
    <input type="submit" value="変更">
  </form>
</section>
@endsection