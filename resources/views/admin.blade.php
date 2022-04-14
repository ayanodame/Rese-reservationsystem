@extends('layouts.admin_default')

@section('Rese管理画面')

@section('css')
@if(app('env')=='local')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endif
<link rel="stylesheet" href="{{ secure_asset('css/admin.css') }}">
@endsection

@section('main')
<main class="admin">
  <section class="search">
    <div class="search__title">
      <h2 class="search__title__name">検索</h2>
    </div>
    <div class="search__form">
      <form action="/admin" method="get">
        @csrf
        <div class="search__list">
          <div class="search__shop">
            <div class="search__shop__title">
              <p class="search__shop__title-name">店舗名</p>
            </div>
            <div class="search__shop__content">
              <select class="form__shop" name="input_shop" value="{{$shopId}}" onchange="submit(this.form)">
                <option name="input_shop" value="">全店舗</option>
                @foreach($shops as $shop)
                <option name="input_area" value="{{$shop->id}}" <?php ($shop->id) == $shopId ? print "selected" : print ""; ?>>{{$shop->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="search__owner">
            <div class="search__owner__title">
              <p class="search__owner__title-name">担当者名</p>
            </div>
            <div class="search__owner__content">
              <input type="text" class="form__owner" name="input_keyword" value="{{$keywords}}">
            </div>
          </div>
          <div class="search__email">
            <div class="search__email__title">
              <p class="search__email__title-name">Email</p>
            </div>
            <div class="search__email__content">
              <input type="text" class="form__email" name="input_email" value="{{$email}}">
            </div>
          </div>
          <div class="search__submit">
            <input type="submit" value="検索" class="search__submit__button">
          </div>
        </div>
      </form>
    </div>
  </section>
  <section class="list">
    <div class="list__title">
      <h2 class="list__title__name">店舗管理者一覧</h2>
    </div>
    <div class="list__contents">
      <table class="owners">
        <tr class="owners__title">
          <th class="owners__title__name">店舗代表者名</th>
          <th class="owners__title__shop">担当店舗名</th>
          <th class="owners__title__email">メールアドレス</th>
        </tr>
        @foreach($items as $item)
        <tr class="owners__list">
          <td class="owners__list__name">{{$item->name}}</td>
          <td class="owners__list__shop">{{$item->shop->name??'-'}}</td>
          <td class="owners__list__email">{{$item->email}}</td>
        </tr>
        @endforeach
      </table>
    </div>
    {{ $items->links() }}
  </section>
  <div class="button">
    <a href="/owner/register" class="button__register">店舗担当者登録</a>
  </div>

  <section class="list">
    <div class="list__title">
      <h2 class="list__title__name">エリア管理一覧</h2>
    </div>
    <div class="list__contents">
      <table class="areas">
        <tr class="areas__title">
          <th class="areas__title__name">エリア名</th>
        </tr>
        @foreach($areas as $area)
        <tr class="areas__list">
          <td class="areas__list__name">{{$area->name}}</td>
        </tr>
        @endforeach
      </table>
    </div>
    {{ $areas->links() }}
  </section>
  <div class="button">
    <a href="/area/register" class="button__register">エリア登録</a>
  </div>

  <section class="list">
    <div class="list__title">
      <h2 class="list__title__name">ジャンル管理一覧</h2>
    </div>
    <div class="list__contents">
      <table class="genres">
        <tr class="genres__title">
          <th class="genres__title__name">エリア名</th>
        </tr>
        @foreach($genres as $genre)
        <tr class="genres__list">
          <td class="genres__list__name">{{$genre->name}}</td>
        </tr>
        @endforeach
      </table>
    </div>
    {{ $genres->links() }}
  </section>
  <div class="button">
    <a href="/genre/register" class="button__register">ジャンル登録</a>
  </div>
</main>
@endsection