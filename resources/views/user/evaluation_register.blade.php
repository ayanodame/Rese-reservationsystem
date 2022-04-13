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
  <div class="information">
    <div class="information__title">
      <p class="information__title__name">予約したお店</p>
    </div>
    <div class="information__content">
      <img src="{{$item->shop->image_url}}" alt="{{$item->shop->name}}" class="information__content__image">
      <p class="information__content__title">{{$item->shop->name}}</p>
      <div class="hashtag">
        <p class="information__content__area">#{{$item->shop->area->name}}</p>
        <p class="information__content__genre">#{{$item->shop->genre->name}}</p>
      </div>

      <p class="information__content__summary">{{$item->shop->summary}}</p>
    </div>
  </div>
  <div class="value">
    <div class="value__title">
      <p class="value__title__name">評価・ご意見</p>
    </div>
    <form action="/evaluation/register" method="post">
      @csrf
      <input type="hidden" name="shop_id" value="{{$item->shop->id}}">
      <input type="hidden" name="user_id" value="{{$item->user->id}}">
      <div class="value__content">
        <table class="list">
          <tr class="list__rate">
            <th class="list__rate__title">５段階評価</th>
            <td class="list__rate__content">
              @if($errors->has('rate'))
              <p class="error-message">{{$errors->first('rate')}}</p>
              @endif
              <select name="rate" class="list__rate__content-form">
                <option value="11111">とても美味しかった</option>
                <option value="1111">美味しかった</option>
                <option value="111">普通</option>
                <option value="11">美味しくなかった</option>
                <option value="1">全然美味しくなかった</option>
              </select>
            </td>
          </tr>
          <tr class="list__comment">
            <th class="list__comment__title">ご意見・ご感想</th>
            <td class="list__comment__content">
              @if($errors->has('comment'))
              <p class="error-message">{{$errors->first('comment')}}</p>
              @endif
              <textarea name="comment" cols="50" rows="10" class="list__comment__content-form"></textarea>
            </td>
          </tr>
        </table>
      </div>
      <div class="value__button">
        <input type="submit" value="送信" class="value__button__register">
      </div>
    </form>
  </div>
</main>


@endsection