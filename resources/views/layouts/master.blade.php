<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Calls') - Browser Calls</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="{{ asset('css/bicycle-polo.css') }}" rel="stylesheet">

    @yield('css')
  </head>

  <body>

    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Birchwood Bicycle Polo Co.</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ route('dashboard') }}">Support dashboard</a></li>
          </ul>
        </div>
      </div>
    </nav>

    @yield('content')

    <div class="container">

      <footer>
        <p>&copy; Your Company 2015</p>
      </footer>

    </div> <!-- /container -->

    <!-- JavaScript -->
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="//static.twilio.com/libs/twiliojs/1.2/twilio.min.js"></script>

    @yield('javascript')

    <script src="{{ asset('js/browser-calls.js') }}"></script>

  </body>

</html>
