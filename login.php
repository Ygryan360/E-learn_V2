
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>E-learn V2 | S'inscrire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINEARICONS CSS -->
    <link rel="stylesheet" href="assets/fonts/linearicons/style.css">
    <link rel="stylesheet" href="assets/css/login.register.css">
    <!-- FavIcons -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/android-chrome-192x192.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png" />
    <link rel="manifest" href="assets/img/site.webmanifest" />
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
            <img src="./assets/img/image-1.png" alt="" class="image-1">
            <form id="registerForm" action="" method="post">
                <h3>Connexion</h3>
                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input type="text" class="form-control" placeholder="Nom d'utilisateur" id="username"
                        name="username" required>
                </div>
                <div class="error-message" id="usernameError"></div>

                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input type="password" class="form-control" placeholder="Mot de passe" id="password" name="password"
                        required>
                </div>
                <div class="error-message" id="passwordError"></div>
                <a href="./register.html">Déjà inscrit ? &rarr;</a>
                <button type="submit">
                    <span>S'inscrire</span>
                </button>
            </form>
            <img src="./assets/img/image-2.png" alt="" class="image-2">
        </div>
    </div>

    <script src="./assets/js/jquery-3.3.1.min.js"></script>
    <script>
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            let valid = true;

            // Reset error messages
            document.querySelectorAll('.error-message').forEach(function(el) {
                el.textContent = '';
            });

            // Check username
            const username = document.getElementById('username').value;
            if (username.length < 3) {
                document.getElementById('usernameError').textContent = "Le nom d'utilisateur doit contenir au moins 3 caractères.";
                valid = false;
            }

            // Check password
            const password = document.getElementById('password').value;
            if (password.length >= 6) {
                valid = true;
            } else {
                document.getElementById('passwordError').textContent = "Le mot de passe doit contenir au moins 6 caractères.";
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