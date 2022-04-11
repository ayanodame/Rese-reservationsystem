<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  @if(app('env')=='local')
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owner_default.css') }}">
  @endif
  <link rel="stylesheet" href="{{ secure_asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('css/owner_default.css') }}">
  @yield('css')
</head>

<body>
  <header class="system-header">
    <div class="menu-title">
      <a href="/owner/mypage/{{$item->id}}" class="menu-title__name">店舗担当者画面</a>
    </div>
  </header>

  @yield('main')
</body>

</html>