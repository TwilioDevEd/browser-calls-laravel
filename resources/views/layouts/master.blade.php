<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Calls') - Browser Calls</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- CSS -->
    <link rel="stylesheet" href="/css/app.css">

    @yield('css')
  </head>

  <body>

  <nav class="navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Birchwood Bicycle Polo Co.</a>
    <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('dashboard') }}">Support dashboard</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    @yield('content')

    <footer class="container">
      <div class="row">
        <p class="p-2 flex-grow-1">&copy; Your Company 2020</p>
        @yield('footer')
      </div>
    </footer>

    <script src="/js/vendor.js"></script>

    @yield('javascript')

    <script src="/js/manifest.js"></script>
    <script src="/js/browser-calls.js"></script>

  </body>

</html>
