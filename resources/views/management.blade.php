@extends('layouts.manage_default')

@section('Rese管理画面')

@section('css')
@if(app('env')=='local')
<link rel="stylesheet" href="{{ asset('css/management.css') }}">
@endif
<link rel="stylesheet" href="{{ secure_asset('css/management.css') }}">
@endsection

@section('main')
<h2>
  <a href="/owner/register">店舗担当者登録</a>
</h2>
<main class="search">
  <div class="serach-form__title">
    <h2 class="search-form__title__name">検索</h2>
  </div>
</main>

<form action="/manage" method="get">
  @csrf
  <table class="search__list">
    <tr class="search__shop">
      <th class="search__shop__title">
        <p class="search__shop__title-name">店舗名</p>
      </th>
      <td class="search__shop__content">
        <select class="form__shop" name="input_shop" value="{{$shopId}}" onchange="submit(this.form)">
          <option name="input_shop" value="">全店舗</option>
          @foreach($shops as $shop)
          <option name="input_area" value="{{$shop->id}}" <?php ($shop->id) == $shopId ? print "selected" : print ""; ?>>{{$shop->name}}</option>
          @endforeach
        </select>
      </td>
    </tr>
    <tr class="search__owner">
      <th class="search__owner__title">
        <p class="search__owner__title-name">担当者名</p>
      </th>
      <td class="search__owner__content">
        <input type="text" class="form__keyword" name="input_keyword" value="{{$keywords}}">
      </td>
    </tr>
    <tr class="search__email">
      <th class="search__email__title">
        <p class="search__email__title-name">Email</p>
      </th>
      <td class="search__email__content">
        <input type="text" class="form__email" name="input_email" value="{{$email}}">
      </td>
    </tr>
  </table>
</form>
<h2>店舗管理一覧</h2>

<table class="owners">
  <tr class="owners__title">
    <th class="owners__title__name">店舗代表者名</th>
    <th class="owners__title__shop">担当店舗名</th>
    <th class="owners__title__email">メールアドレス</th>
  </tr>
  @if($owners->count())
  @foreach($owners as $owner)
  <tr class="owners__list">
    <td class="owners__list__name">{{$owner->name}}</td>
    <td class="owners__list__shop">{{$owner->shop->name}}</td>
    <td class="owners__list__email">{{$owner->email}}</td>
  </tr>
</table>
@endforeach
@else
<div class="message">
  <p class="message__none">検索結果がありませんでした。<br>条件を変えて再検索してください。</p>
</div>
@endif
</main>

@endsection