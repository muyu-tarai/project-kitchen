@extends('preLoginLayout')
@section('header_right')
@if(Auth::check())
<div class="hamburger-menu">
          <div id="menu-btn-check">
          <label for="menu-btn-check" class="menu-btn"><span></span></label>
</div>
      </nav>
<div id="nav" class="header-right medium hidden">
  <a href="/store_update">出店準備</a>
  <a href="/store_register">登録内容変更</a>
  <a href="/mypage">マイページ</a>
  <a href="/logout">ログアウト</a>
</div>
@endif
<form action="{{ route('logout') }}" method="post" id="logout-form">@csrf</form>
@endsection

@section('scripts')
@if(Auth::check())
  <script>
    console.log
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
@endif
@endsection