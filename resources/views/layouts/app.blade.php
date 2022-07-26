<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://bootstrap-colors-extended.herokuapp.com/bootstrap-colors.css" />
    @stack('styles')

    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-yellow-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    Buttercup Events
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth('admin')
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Administration
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    {{-- <small class="d-block ps-3 fw-bold">Admin Panel</small>
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        Dashboard
                                    </a>
                                    <div class="dropdown-divider"></div> --}}
                                    <small class="d-block ps-3 fw-bold">Authentication</small>
                                    <a class="dropdown-item" href="{{ route('admin.administrators.index') }}">
                                        Administrators
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                        Users
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <small class="d-block ps-3 fw-bold">Content</small>
                                    <a class="dropdown-item" href="{{ route('admin.pages.index') }}">
                                        Pages
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <small class="d-block ps-3 fw-bold">Event</small>
                                    <a class="dropdown-item" href="{{ route('admin.events.index') }}">
                                        Events
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.categories.index') }}">
                                        Categories
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <small class="d-block ps-3 fw-bold">Finance</small>
                                    <a class="dropdown-item" href="{{ route('admin.subscriptions.index') }}">
                                        Subscriptions
                                    </a>
                                </div>
                            </li>
                        @endauth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('archive') }}">
                                Archive
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @auth('web')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('reservation.index') }}">My Events</a>
                            </li>
                        @endauth
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.show', Auth::user()) }}">
                                        Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">

            <div class="container">
                <div class="row">
                    <div class="col">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            @yield('content')
        </main>
        <div class="container">
            <footer class="py-5">
              <div class="row">
                <div class="col-6 col-md-3 mb-3">
                  <h5>Buttercup Events</h5>
                  <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ route('home') }}" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('archive') }}" class="nav-link p-0 text-muted">Archive</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('pages.show', 'about-us') }}" class="nav-link p-0 text-muted">About Us</a></li>
                  </ul>
                </div>

                <div class="col-6 col-md-3 mb-3">
                  <h5>Management</h5>
                  <ul class="nav flex-column">
                    @auth('admin')
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-transparent border-0 nav-link p-0 text-muted">Manager Logout</button>
                        </form>
                    @endauth
                    @guest('admin')
                        <li class="nav-item mb-2"><a href="/admin/login" class="nav-link p-0 text-muted">Manager Access</a></li>
                    @endguest
                   </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">
                  <form>
                    <h5>Subscribe to our newsletter</h5>
                    <p>Monthly digest of what's new and exciting from us.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                      <label for="newsletter1" class="visually-hidden">Email address</label>
                      <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                      <button class="btn btn-primary" type="button">Subscribe</button>
                    </div>
                  </form>
                </div>
              </div>

              <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                <p>© {{ date('Y') }} Buttercup Events, Inc</p>
                <ul class="list-unstyled d-flex">
                  <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
                  <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
                  <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
                </ul>
              </div>
            </footer>
          </div>
    </div>
    <script src="//cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    @stack('scripts')
</body>
</html>
