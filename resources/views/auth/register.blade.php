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
          <nav class="panel panel-default">
            <div class="panel-heading">SIGN UP</div>
            <div class="panel-body">
              <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="form-group">
                  <div class="about">
                    <label for="name">username</label>
                    @error('name')
                    <span role="alert">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="input">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                  </div>
                </div>

                <div class="form-group">
                  <div class="about">
                    <label for="email">mail</label>
                    @error('email')
                    <span role="alert">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="input">
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="about">
                    <label for="password">password</label>
                    @error('password')
                    <span role="alert">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="input">
                    <input type="password" class="form-control" id="password" name="password">
                  </div>

                </div>
                <div class="form-group">
                  <div class="about">
                    <label for="password-confirm">password check</label>
                  </div>
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
      </nav>
    </div>
  </div>
  </div>
  </div>
</body>
@endsection