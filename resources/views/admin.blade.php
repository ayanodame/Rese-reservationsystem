@extends('layouts.admin_default')

@section('Rese管理画面')

@section('css')
@if(app('env')=='local')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endif
<link rel="stylesheet" href="{{ secure_asset('css/admin.css') }}">
@endsection

@section('main')
<main class="list">
  <div class="list__title">
    <h2 class="list__title__name">店舗管理一覧</h2>
  </div>
  <div class="list__contents">
    <table class="owners">
      <tr class="owners__title">
        <th class="owners__title__name">店舗代表者名</th>
        <th class="owners__title__shop">担当店舗名</th>
        <th class="owners__title__email">メールアドレス</th>
      </tr>
      @foreach($owners as $owner)
      <tr class="owners__list">
        <td class="owners__list__name">{{$owner->name}}</td>
        <td class="owners__list__shop">{{$owner->shop->name}}</td>
        <td class="owners__list__email">{{$owner->email}}</td>
      </tr>
      @endforeach
    </table>
  </div>

  {{$owners->links()}}

</main>
<div class="button">
  <a href="/owner/register" class="button__register">店舗担当者登録</a>
</div>

<div class="button">
  <a href="/area/register" class="button__register">エリア登録</a>
</div>
@endsection