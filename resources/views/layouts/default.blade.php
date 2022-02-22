<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  @if(app('env')=='local')
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/default.css') }}">
  @endif
  @if(app('env')=='production')
  <link rel="stylesheet" href="{{ secure_asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('css/default.css') }}">
  @endif
  @yield('css')
</head>

<body>
  <header class="system-header">
    <div class="header-top">
      <div class="menu" id="menu">
        <span class="menu__line--top"></span>
        <span class="menu__line--middle"></span>
        <span class="menu__line--bottom"></span>
      </div>
      <div class="menu-title">
        <a href="/" class="menu-title__name">Rese</a>
      </div>
    </div>
    @yield('side')
  </header>

  @yield('main')
  @if(app('env')=='local')
  <script src="{{ asset('js/main.js') }}"></script>
  @endif
  @if(app('env')=='production')
  <script src="{{ secure_asset('js/main.js') }}"></script>
  @endif
</body>

</html>