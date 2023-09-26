@extends('preLoginLayout')
@section('css')
<link rel="stylesheet" href="/css/leave_account_complete.css
">
@endsection

@section('content')
<body>
  <div class="y">
     <div class="container">
      <div class="row">
        <div class="Withdrawal">
          <p>登録された内容は全て消去されますが</p>
        </div>
        <div class="Withdrawal2">
          <p>本当に退会しますか？</p>
        </div>
      </div>
      <div class="button">
      <div class="button2">
        <button type="submit" class="yes">はい</button>
      </div>
      <div class="button2">
        <button type="submit" class="no">いいえ</button>
        </div>
      </div>
    </div>
  </div>
  </div>
  </body>
@endsection
