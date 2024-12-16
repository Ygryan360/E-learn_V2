<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <!-- FavIcons -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico" type="image/x-icon') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/android-chrome-192x192.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('img/site.webmanifest') }}" />
    <script src="{{ asset('js/main.js') }}" defer></script>
    <title>@yield('title') | E-learn V2</title>
</head>

<body>
    <!-- Nav bar -->
    <header class="d-flex flex-wrap justify-content-center p-3">
        <a href="{{ route('home') }}"
            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto m-2 link-body-emphasis text-decoration-none">
            <img src="{{ asset('img/android-chrome-192x192.png') }}" alt="UL">
            <span class="fs-3">E-Learn V2</span>
        </a>
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link active" aria-current="page">Accueil</a>
            </li>
            @guest
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Se Connecter</a></li>
                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">S'inscrire</a></li>
            @endguest
            @auth
                <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">Cours</a></li>
            @endauth
        </ul>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="d-flex container justify-content-center py-3 ">
            <p class="fade-in-up text-center">
                &copy; 2024 - E-Learn V2 | By YGR
            </p>
            <button id="scrollToTop" onclick="scrollToTop()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chevron-up" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z" />
                </svg>
            </button>
        </div>
    </footer>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>
