<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <ul class="nav navbar-right">
            <div class="col">
              <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
              </li>
            </div>
              <div class="col">
              <li class="nav-item">
                <a class="nav-link" href="/todo/active">Active</a>
              </li>
              </div>
              <div class="col">
              <li class="nav-item">
                <a class="nav-link" href="/todo/done">Done</a>
              </li>
              </div>
              <div class="col">
              <li class="nav-item">
                <a class="nav-link" href="/todo/deleted">Deleted</a>
              </li>
              </div>
              @if (Route::has('login'))
                    @auth
                        <div class="col">
                        <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
                        </li>
                        </div>
                    @else
                        <div class="col">
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Log in</a>
                        </li>
                        </div>
                        @if (Route::has('register'))
                            <div class="col">
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                            </div>
                        @endif
                    @endauth
                @endif
            </ul>

          </div>
        </div>
      </div>
</body>
</html>
