<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('/') }}vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('/') }}css/shop-homepage.css" rel="stylesheet">
  <link href="{{ asset('/') }}css/shop-details.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="{{ asset('/') }}vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('/') }}js/jquery.zoom.min.js"></script>

  <script src="{{ asset('/') }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Home
              <span class="sr-only"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contact">Contact</a>
          </li>
        {{-- </ul>

        <ul> --}}
          @if (Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            {{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}
          </a>
        </li>
      <form id="logout-form" action=" {{ route('logout') }}" method="POST">@csrf</form>
        @else
        <li class="nav-item">
        <a class="nav-link" href=" {{ url('/login') }}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=" {{ url('/register') }}">Register</a>
        </li>
        @endif
        </ul>



      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

      @yield('content')

  </div>
  <!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->


</body>

</html>  