<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>E-learn V2 | S'inscrire</title>
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
            color: #ff0000;
            font-size: 15px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="inner">
            <img src="{{ asset('img/image-1.png') }}" alt="" class="image-1">
            <form id="registerForm" action="" method="post">
                @csrf
                <h3>Inscription</h3>
                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input type="text" class="form-control" placeholder="Nom" id="name" name="name" required
                        value="{{ old('name') }}">
                </div>
                <div class="error-message" id="nameError">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
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
                    <span class="lnr lnr-envelope"></span>
                    <input type="email" class="form-control" placeholder="Adresse e-mail" id="email"
                        name="email" required value="{{ old('email') }}">
                </div>
                <div class="error-message" id="emailError">
                    @error('email')
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
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input type="password" class="form-control" placeholder="Confirmer le mot de passe"
                        id="password_confirmation" name="password_confirmation" required>
                </div>
                <div class="error-message" id="password_confirmationError">
                    @error('password_confirmation')
                        {{ $message }}
                    @enderror
                </div>
                <a href="{{ route('login') }}">Déjà inscrit ? &rarr;</a>
                <button type="submit">
                    <span>S'inscrire</span>
                </button>
            </form>
            <img src="{{ asset('img/image-2.png') }}" alt="" class="image-2">
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script>
        document.getElementById('registerForm').addEventListener('submit', function(event) {
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

            // Check email
            const email = document.getElementById('email').value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                document.getElementById('emailError').textContent = "L'adresse e-mail n'est pas valide.";
                valid = false;
            }

            // Check password
            const password = document.getElementById('password').value;
            if (password.length >= 6) {
                const password_confirmation = document.getElementById('password_confirmation').value;
                // Check confirm password
                if (password !== password_confirmation) {
                    document.getElementById('password_confirmationError').textContent =
                        "Les mots de passe ne correspondent pas.";
                    valid = false;
                }
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
