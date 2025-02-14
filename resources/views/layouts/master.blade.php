<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

        {{-- icons --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(["resources/css/app.css", "resources/js/app.js"])
    @yield('vite')
    <title>EKVK</title>
</head>

<body>

    <nav class="navbar navbar-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="bi bi-moon-stars"></i>
                EKVK</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title " id="offcanvasNavbarLabel">
                        EKVK Menu
                    </h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('welcome')}}"><i class="bi bi-house-fill"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('about')}}"><i class="bi bi-people-fill"></i> Rólunk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('download')}}"><i class="bi bi-arrow-down-circle"></i> Letöltés</a>
                        </li>

                    </ul>
                    <hr>
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        @if(Auth::check())
                        <li><a class="nav-link active" href="{{route('account')}}"><i class="bi bi-person-fill"></i> {{Auth::user()->username}}</a></li>
                        <li><a class="nav-link active" href="{{route('logout')}}"><i class="bi bi-door-closed"></i> Kijelentkezés</a></li>
                        @else

                        <li><a class="nav-link active" href="{{route('login')}}"><i class="bi bi-person"></i> Bejelentkezés </a></li>
                        <li><a class="nav-link active" href="{{route('register')}}"><i class="bi bi-person-add"></i> Regisztáció</a></li>
                        @endif</span></li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

</body>

</html>
