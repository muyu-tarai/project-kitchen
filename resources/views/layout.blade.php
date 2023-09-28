@extends('preLoginLayout')
@section('header_right')
@if(Auth::check())
<div class="header-right medium">
  <a href="store_update.php">出店準備</a>
  <a href="mypage">マイページ</a>
  <a href="index" id="logout">ログアウト</a>
</div>
@endif
<form action="{{ route('logout') }}" method="post" id="logout-form">@csrf</form>
@endsection

@section('scripts')
@if(Auth::check())
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
@endif
@endsection