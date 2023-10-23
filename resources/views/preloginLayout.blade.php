<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>キッチンカー情報局</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="/css/common.css">
  @yield('css')
  <script src="https://kit.fontawesome.com/66cf41360e.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  <div class="header-main">
  <div class="header">
    <header>
      <nav class="navbar">
        <div class="logo">
          <a class="x-large logo" href="/"><img src="data:image/png;base64,{{ base64_encode(Storage::disk('dropbox')->get('view/headerLogo.png')) }}"></a>
        </div>
        @yield('header_right')

    </header>
  </div>
  <main class="main">
    @yield('content')
  </main>
  </div>
  <div class="footer">
    <footer>
      <p class="small">
        ©&nbsp;2023&nbsp;キッチンカー情報局&nbsp;Inc
      </p>
    </footer>
  </div>
  @yield('js')
  <script>
    const hamburger = document.getElementById('menu-btn-check')
    const nav = document.getElementById('nav')
    if (hamburger != null) {
      hamburger.addEventListener('click', function() {
        nav.classList.toggle('hidden');
      });
    }
  </script>
</body>

</html>