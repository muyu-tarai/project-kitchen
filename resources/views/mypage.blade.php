@extends('preLoginLayout')
@section('css')
<link rel="stylesheet" href="/css/mypage.css">
@endsection

@section('content')


<body>

  <div class="imag-car">
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
          <p class="panel-heading">マイページ</p>
          <form action="{{ route('settings.update') }}" method="post">
            @csrf
            <div class="panel-body">
              <div class="about">
                <label for="name">ユーザー名</label>
                @error('name')
                <span role="alert">{{ $message }}</span>
                @enderror
              </div>
              <div class="input">
                <input type="text" class="form-control" id="name" name="name" value="{{  Auth::user()->name }}" />

              </div>

              <div class="email">
                <p>メールアドレス</p>
              </div>
              <div class="email2">
                <p>{{ Auth::user()->email }}</p>
              </div>
            </div>
            <div class="button">
              <button type="submit" class="updeta">更新</button>
              <button type="submit" class="Withdrawal">退会</button>
            </div>
        </div>
      </div>
    </div>
  </div>
</body>
@endsection