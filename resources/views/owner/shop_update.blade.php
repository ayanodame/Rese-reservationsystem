<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rese 店舗情報登録</title>
  @if(app('env')=='local')
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owner_default.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owner/shop_update.css') }}">
  @endif
  <link rel="stylesheet" href="{{ secure_asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('css/owner_default.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('css/owner/shop_update.css') }}">
</head>

<body>
  <header class="system-header">
    <div class="menu-title">
      <a href="/owner/mypage/{{$item->owner->id}}" class="menu-title__name">店舗担当者画面</a>
    </div>
  </header>
  <main class="update">
    <div class="box">
      <div class="box__title">
        <p class="box__title__name">店舗情報更新</p>
      </div>
      <div class="box__content">
        <form action="/shop/update" method="post">
          @csrf
          <input type="hidden" name="owner_id" value="{{$item->owner->id}}">
          <div class="box__content__form">
            @if($errors->has('name'))
            <div class="form__error">
              <p class="error-message">{{$errors->first('name')}}</p>
            </div>
            @endif
            <div class="form__text">
              <img class="form__text__image" src="/icon/ショップアイコン4.svg" alt="ショップアイコン">
              <input type="text" class="form__text__name" name="name" value="{{$item->name}}">
            </div>
            <div class="form__text">
              <img class="form__text__image" src="/icon/日本地図のアイコン.svg" alt="地図アイコン">
              <p class="form__text__title">エリア</p>
              <select name="area_id" class="form__text__area">
                @foreach($areas as $area)
                <option value="{{$area->id}}" <?php ($area->id) == $item->area->id ? print "selected" : print ""; ?>>{{$area->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form__text">
              <img class="form__text__image" src="/icon/フォークとナイフのお食事アイコン素材2.svg" alt="ジャンルアイコン">
              <p class="form__text__title">ジャンル</p>
              <select name="genre_id" class="form__text__genre">
                @foreach($genres as $genre)
                <option value="{{$genre->id}}" <?php ($genre->id) == $item->genre->id ? print "selected" : print ""; ?>>{{$genre->name}}</option>
                @endforeach
              </select>
            </div>
            @if($errors->has('summary'))
            <div class="form__error">
              <p class="error-message">{{$errors->first('summary')}}</p>
            </div>
            @endif
            <div class="form__text">
              <textarea name="summary" class="form__text__summary" cols="100" rows="10" placeholder="お店の特徴など">{{$item->summary}}</textarea>
            </div>
            @if($errors->has('open_time'))
            <div class="form__error">
              <p class="error-message">{{$errors->first('open_time')}}</p>
            </div>
            @endif
            <div class="form__text">
              <img class="form__text__image" src="/icon/シンプルな丸時計のアイコン.svg" alt="時計アイコン">
              <p class="form__text__title">開店時間</p>
              <?php $openTime = date('H:i', strtotime($item->open_time)) ?>
              <select name="open_time" class="form__text__open-time">
                <?php
                $timeList = array();
                $startTime = date('H:i', strtotime('11:00')); //開始時刻を定義
                $endTime = date('H:i', strtotime('23:30')); //終了時刻を定義

                array_push($timeList, $startTime); //$timeListの配列に開始時刻を追加
                while (true) {  //下記を繰り返します。
                  $startTime = date("H:i", strtotime('+30 minute', strtotime($startTime)));
                  //$startTime＝30分ずつ足していく。
                  if ($startTime >= $endTime) {  //startTimeがendTimeより大きい場合は下記を実行して繰り返しを終了。
                    array_push($timeList, $endTime);
                    //timeListの配列にendTimeの時間を追加。
                    break;
                  }

                  array_push($timeList, $startTime);
                  //timeListに$startTime(=30分ずつ足した時間)の配列を繰り返し追加する。
                }
                ?>
                <!--ここまで-->
                @foreach($timeList as $time)
                <option value="{{$time}}" <?php $time == $openTime ? print "selected" : print ""; ?>>{{$time}}</option>
                @endforeach
              </select>
            </div>
            @if($errors->has('close_time'))
            <div class="form__error">
              <p class="error-message">{{$errors->first('close_time')}}</p>
            </div>
            @endif
            <div class="form__text">
              <img class="form__text__image" src="/icon/シンプルな丸時計のアイコン.svg" alt="時計アイコン">
              <p class="form__text__title">閉店時間</p>
              <?php $closeTime = date('H:i', strtotime($item->close_time)) ?>
              <select name="close_time" class="form__text__close-time">
                @foreach($timeList as $time)
                <option value="{{$time}}" <?php ($time) == $closeTime ? print "selected" : print ""; ?>>{{$time}}</option>
                @endforeach
              </select>
            </div>
            @if($errors->has('image_url'))
            <div class="form__error">
              <p class="error-message">{{$errors->first('image_url')}}</p>
            </div>
            @endif
            <div class="form__text">
              <img class="form__text__image" src="/icon/カメラのアイコン素材 6.svg" alt="カメラのアイコン">
              <input type="text" class="form__text__name" name="image_url" placeholder="イメージURL" value="{{$item->image_url}}">
            </div>
          </div>
          <div class="box__content__button">
            <input type="submit" class="form__button" value="店舗情報更新">
          </div>
        </form>
      </div>
    </div>
  </main>
</body>

</html>