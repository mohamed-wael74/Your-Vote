<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Online Vote') }}</title>

    <!-- Vendor CSS Files -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/css/fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="">
        <!-- ======= Header ======= -->
        <div class="container-fluied  justify-content-lg-between">

            <nav data-aos="fade-down" data-aos-duration="1000" class="navbar">
                <a href="#"><img src="{{ asset('assets/img/Logo.png') }}" alt="Logo"></a>
                <ul class="navbar-links">
                    <li><a href="#" id="features">Features</a></li>
                    <li><a href="#" id="how">How it works</a></li>
                    <li><a href="#" id="others">Pricing</a></li>
                </ul>
                @php
                    $i = 1;
                @endphp
                @guest('voter')
                    @auth('org')
                    @else
                        @php
                            $i = 0;
                        @endphp
                    @endauth
                @endguest
                @if ($i == 0)
                    <div class="navbar-buttons">
                        <button class="signin " data-bs-toggle="modal" data-bs-target="#exampleModal"
                            href="#">LOGIN</button>
                    </div>
                @elseif($i == 1)
                    <button href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        class="signin"> LOGOUT </button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endif
            </nav><!-- .navbar -->
        </div>
        </header><!-- End Header -->


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">LOGIN</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            @if (session()->get('success'))
                            <p class="text-center small" style="
                            color:red "> {{session()->get('success')}}
                            </p>
                            @endif
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                            id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        @yield('content')

        <div class="footer">
            <div class="footer-content row">
                <div class="logo col-lg-3 col-md-4 col-sm-6">
                    <img src="{{ asset('assets/img/Logooo.png') }}">
                </div>
                <div class="des col-lg-3 col-md-4 col-sm-6">
                    <h2>about us</h2>
                    <p>poll maker</p>
                    <p>professional election</p>
                    <p>customized election</p>
                </div>
                <div class="des col-lg-3 col-md-4 col-sm-6">
                    <h2>pricing</h2>
                    <p>free</p>
                    <p>premium</p>
                </div>
                <div class="des col-lg-3 col-md-4 col-sm-6">
                    <h2>contact us</h2>
                    <p>e-mail</p>
                    <p>facebook</p>
                    <p>linkedin</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS Files -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('css/fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/js/all.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <!-- Template Main JS File -->

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/home.js') }}"></script>
    <script src="{{asset('assets/js/election.js')}}"></script>
    <script src="{{asset('assets/js/payment.js')}}"></script>

    <script>
        AOS.init();
    </script>


</body>

</html>
