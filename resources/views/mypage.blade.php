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
          <nav class="panel panel-default">
            <div class="panel-heading">マイページ</div>
            <div class="panel-body">
              <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="form-group">
                  <div class="about">
                    <label for="name">ユーザー名</label>
                    @error('name')
                    <span role="alert">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="input">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                  </div>
                </div>


                <div class="">
                  <p>メールアドレス</p>
                  <p>majideka-83@ezweb.ne.jp</p>
                  {{-- テーブルからメールアドレスを取得して表示する --}}
                  {{-- @foreach($users as $user)
                  <p>{{ $user->email }}</p>
                  @endforeach --}}
                </div>
            </div>
            </form>
        </div>
        </nav>
      </div>
    </div>
  </div>
  </div>
</body>
@endsection