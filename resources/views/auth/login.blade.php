@extends('preLoginLayout')

@section('css')
<link rel="stylesheet" href="/css/login.css">
@endsection

@section('content')

<body>
  <div class="imag-car">
    <div class="container">
      <form action="{{ route('login') }}">
        <div class="text-center">
          <button type="submit" class="guest" href="">ゲスト</button>
        </div>
      </form>
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="panel panel-default">
            <div class="panel-heading">LOG IN</div>

            <form action="{{ route('login') }}" method="POST" class="form">
              @csrf
              <div class="form-group">
                <div>
                <label for="email" class="label">mail</label>
                </div>
                @error('email')
                <span role="alert">{{ $message }}</span>
                @enderror
                <div class="input">
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="label
                ">password</label>
                @error('password')
                <span role="alert">{{ $message }}</span>
                @enderror
                <input type="password" class="form-control" id="password" name="password" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">LOG IN</button>
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