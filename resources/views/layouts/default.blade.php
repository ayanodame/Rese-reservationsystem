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
  <link rel="stylesheet" href="{{ secure_asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('css/default.css') }}">
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
    <div class="header-menu">
      <nav class="drwermenu" id="nav">
        <ul class="drwermenu__content">
          @if (Auth::check())
          <li class="user-menu">
            <a href="/" class="menu__link">Home</a>
          </li>
          <li class="user-menu">
            <a href="/logout" class="menu__link">Logout</a>
            </form>
          </li>
          <li class="user-menu"><a href="/mypage" class="menu__link">Mypage</a></li>
          @else
          <li class="guest-menu"><a href="/" class="menu__link">Home</a></li>
          <li class="guest-menu"><a href="/user/register" class="menu__link">Registration</a></li>
          <li class="guest-menu"><a href="/login" class="menu__link">Login</a></li>
          @endif
        </ul>
      </nav>
    </div>
    @yield('side')
  </header>

  @yield('main')
  @if(app('env')=='local')
  <script src="{{ asset('js/main.js') }}"></script>
  @endif
  <script src="{{ secure_asset('js/main.js') }}"></script>
</body>

</html>