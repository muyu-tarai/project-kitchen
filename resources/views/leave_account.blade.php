@extends('layout')
@section('css')
<link rel="stylesheet" href="/css/leave_account.css">
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
          <h1>本当に退会しますか？</h1>
        </div>

        <div class="button" id="button">
          <input type="submit" id="modal" class="yes" value="はい"></input>
          <a href="mypage" class="no">いいえ</a>
        </div>
        </form>
        <form action="{{ route('mypage') }}" method="get">
          @csrf
        </form>
      </div>
    </div>
    <div>
      @if(isset($error))
      <div id="myModal" class="mymodal" style="display: block">
        @else
        <div id="myModal" class="mymodal" style="display: none">
          @endif
          <p class="modal1">退会する場合はメールアドレスを入力して<br>送信ボタンを押してください</p>
          <div class="error">
          <span id="error">{{ isset($error) ? $error : ''}}</span>
          </div>
          <div class="send">
            <form action="{{ route('leave_account_complete') }}" method="post">
              @csrf
              <div class="input">
                <input type="text" class="form-control" id="email" name="email" value="{{ isset($gest) ? $gest : old('email') }}" />
              </div>

              <input type="submit" class="send2" formaction="{{ route('leave_account_complete') }}" value="送信"></input>
            </form>
          </div>
          <div class="close">
            <button id="close">閉じる</button>
          </div>
        </div>
      </div>
    </div>
    <div id="modal-bg"></div>

</body>
@endsection
@section('js')
<script src="/js/leave_account.js"></script>
@endsection
