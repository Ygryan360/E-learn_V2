<?php
session_start();
require_once './functions.php';
if (returnLoggedStatus()) {
    redirectToDashboard();
}
if (!empty($_POST)) {
    require_once './dbconnect.php';
    $query = "INSERT INTO `users` (`id`, `username`, `phone`, `email`, `password`, `role`, `register_date`) VALUES (NULL, :username, :phone, :email, :password, 'student', :register_date)";
    $pdostatment = $pdo->prepare($query);
    $pdostatment->execute([
        'username' => $_POST['username'],
        'phone' => $_POST['number'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'register_date' => date("Y-m-d")
    ]);
    $pdostatment->closeCursor();
    $url = 'login.php?n=1';
    redirectToUrl($url);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>E-learn V2 | S'inscrire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINEARICONS CSS -->
    <link rel="stylesheet" href="./assets/fonts/linearicons/style.css">
    <link rel="stylesheet" href="./assets/css/login.register.css">
    <!-- FavIcons -->
    <link rel="shortcut icon" href="./assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/img/android-chrome-192x192.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/img/favicon-16x16.png" />
    <link rel="manifest" href="./assets/img/site.webmanifest" />
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
                <h3>Inscription</h3>
                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input type="text" class="form-control" placeholder="Nom d'utilisateur" id="username"
                        name="username" required>
                </div>
                <div class="error-message" id="usernameError"></div>
                <div class="form-holder">
                    <span class="lnr lnr-phone-handset"></span>
                    <input type="tel" class="form-control" placeholder="Numéro de téléphone" id="number" name="number"
                        required>
                </div>
                <div class="error-message" id="numberError"></div>
                <div class="form-holder">
                    <span class="lnr lnr-envelope"></span>
                    <input type="email" class="form-control" placeholder="Adresse e-mail" id="email" name="email"
                        required>
                </div>
                <div class="error-message" id="emailError"></div>
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input type="password" class="form-control" placeholder="Mot de passe" id="password" name="password"
                        required>
                </div>
                <div class="error-message" id="passwordError"></div>
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input type="password" class="form-control" placeholder="Confirmer le mot de passe"
                        id="confirmPassword" name="confirmPassword" required>
                </div>
                <div class="error-message" id="confirmPasswordError"></div>
                <a href="login.php">Déjà inscrit ? &rarr;</a>
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

            // Check phone number
            const number = document.getElementById('number').value;
            const phonePattern = /^\d{8,12}$/;
            if (!phonePattern.test(number)) {
                document.getElementById('numberError').textContent = "Le numéro de téléphone doit être valide (8 à 12 chiffres).";
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
                const confirmPassword = document.getElementById('confirmPassword').value;
                // Check confirm password
                if (password !== confirmPassword) {
                    document.getElementById('confirmPasswordError').textContent = "Les mots de passe ne correspondent pas.";
                    valid = false;
                }
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