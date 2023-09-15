<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>キッチンカー情報局</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="/css/murai.css">
  <script src="https://kit.fontawesome.com/66cf41360e.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  <div class="header">
    <header>
      <nav class="navbar">
        <a class="x-large" href="#"><img src="/images/header_logo.png"></a>
        @yield('header_right')
      </nav>
    </header>
  </div>
  <main class="main">
    @yield('content')
  </main>
  <div class="footer">
    <footer>
      <p class="small">
        © 2023 キッチンカー情報局 Inc
      </p>
    </footer>
  </div>
</body>

</html>