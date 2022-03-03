@extends('layouts.default')
@section('title','Rese ログイン')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection


@section('main')
<section class="reservation">
  <h2 class="reservation__title">予約状況</h2>
  @foreach($items as $item)
  <div class="reservation__card">
    <div class="reservation__card__header">
      <img src="/icon/シンプルな丸時計のアイコン色変え.svg" alt="時計" class="reservation__card__image">
      <p class="reservation__card__title">予約</p>
    </div>
    <table class="reservation__card__check">
      <tr class="check__shop">
        <th class="check__shop__title">
          <p class="check__shop__title-word">Shop</p>
        </th>
        <td class="check__shop__output">
          <p class="check__shop__output-word">
            {{$items->shop->name}}
          </p>
        </td>
      </tr>
      <tr class="check__date">
        <th class="check__date__title">
          <p class="check__date__title-word">Date</p>
        </th>
        <td class="check__date__output">
          <p class="check__date__output-word">{{$items->use_date}}
          </p>
        </td>
      </tr>
      <tr class="check__time">
        <th class="check__time__title">
          <p class="check__time__title-word">Time</p>
        </th>
        <td class="check__time__output">
          <p class="check__time__output-word">
            <?php $useTime = date("H:i", strtotime($items->use_time));
            print $useTime; ?></p>
        </td>
      </tr>
      <tr class="check__number">
        <th class="check__number__title">
          <p class="check__number__title-word">Number</p>
        </th>
        <td class="check__number__output">
          <p class="check__number__output-word">{{$items->people}}<span class="check__number__people">人</span></p>
        </td>
      </tr>
    </table>
  </div>
  @endforeach
</section>

@if (Auth::check())
<p>{{$user->name}}さん</p>




@endif

@endsection