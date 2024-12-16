<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>E-learn V2 | Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINEARICONS CSS -->
    <link rel="stylesheet" href="{{ asset('fonts/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.register.css') }}">
    <!-- FavIcons -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico" type="image/x-icon') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/android-chrome-192x192.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('img/site.webmanifest') }}" />
    <style>
        .error-message {
            color: #f00;
            font-size: 15px;
            margin-top: 20px;
            font-weight: 500;
        }

        .new-register {
            font-size: 15px;
            margin-top: 20px;
            padding: 10px;
            border-radius: 4px 0 0 4px;
            background-color: #00000010;
            border-left: 4px solid #00C853;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="inner">
            <img src="{{ asset('img/image-1.png') }}" alt="" class="image-1">
            <form id="loginForm" action="" method="post">
                @csrf
                <h3>Connexion</h3>
                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input type="text" class="form-control" placeholder="Nom d'utilisateur" id="username"
                        name="username" required value="{{ old('username') }}">
                </div>
                <div class="error-message" id="usernameError">
                    @error('username')
                        {{ $message }}
                    @enderror
                </div>

                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input type="password" class="form-control" placeholder="Mot de passe" id="password"
                        name="password" required>
                </div>
                <div class="error-message" id="passwordError">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
                <a href="{{ route('register') }}">Pas encore inscrit ? &rarr;</a>
                <button type="submit">
                    <span>Se Connecter</span>
                </button>

                @if (session('succes'))
                    <div class="new-register">
                        {{ session('succes') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="error-message">
                        {{ session('error') }}
                    </div>
                @endif
            </form>
            <img src="{{ asset('img/image-2.png') }}" alt="" class="image-2">
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            let valid = true;

            // Reset error messages
            document.querySelectorAll('.error-message').forEach(function(el) {
                el.textContent = '';
            });

            // Check username
            const username = document.getElementById('username').value;
            if (username.length < 6) {
                document.getElementById('usernameError').textContent =
                    "Le nom d'utilisateur doit contenir au moins 6 caractères.";
                valid = false;
            }

            // Check password
            const password = document.getElementById('password').value;
            if (password.length >= 6) {
                valid = true;
            } else {
                document.getElementById('passwordError').textContent =
                    "Le mot de passe doit contenir au moins 6 caractères.";
                valid = false;
            }

            // If the form is not valid, prevent submission
            if (!valid) {
                event.preventDefault();
            }
        });
        (function($) {
            "use strict";

            var fullHeight = function() {
                $(".js-fullheight").css("height", $(window).height());
                $(window).resize(function() {
                    $(".js-fullheight").css("height", $(window).height());
                });
            };
            fullHeight();

            $("#sidebarCollapse").on("click", function() {
                $("#sidebar").toggleClass("active");
            });
        })(jQuery);
    </script>
</body>

</html>
