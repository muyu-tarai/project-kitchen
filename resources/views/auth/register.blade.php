
@extends('preLoginLayout')
@section('css')
<link rel="stylesheet" href="/css/register.css">
@endsection
@section('content')

<body>
  <div class="imag-car">
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">

          <div class="panel-heading">SIGN UP</div>
          <div class="panel-body">
            <form action="{{ route('register') }}" method="POST">
              @csrf

              <div class="form-group">

                <label for="name" class="alert">username</label>
                @error('name')
                <span role="alert">{{ $message }}</span>
                @enderror

                <div class="input">
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                </div>
              </div>

              <div class="form-group">

                <label for="email" class="alert">mail</label>
                @error('email')
                <span role="alert">{{ $message }}</span>
                @enderror

                <div class="input">
                  <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                </div>
              </div>
              <div class="form-group">

                <label for="password" class="alert">password</label>
                @error('password')
                <span role="alert">{{ $message }}</span>
                @enderror

                <div class="input">
                  <input type="password" class="form-control" id="password" name="password">
                </div>

              </div>
              <div class="form-group">

                <label for="password-confirm" class="alert">password check</label>

                <div class="input">
                  <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                </div>
              </div>
          </div>
          <div class="text-right">
            <button type="submit" class="btn-primary">SIGN UP</button>
          </div>
        </div>
        </form>
      </div>

    </div>
  </div>
  </div>
  </div>
</body>
@endsection