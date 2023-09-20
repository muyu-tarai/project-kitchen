@extends('preLoginLayout')
@section('css')
<link rel="stylesheet" href="/css/leave_account.css
">
@endsection

@section('content')


<body>
  <div class="imag-car">
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
        <button type="submit" class="yes">はい</button>
      </div>
    </div>
  </div>
  </body>
@endsection