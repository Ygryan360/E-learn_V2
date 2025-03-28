<?php
session_start();
require_once './functions.php';
if (returnLoggedStatus()) {
    redirectToDashboard();
}

if (!empty($_POST)) {
    require_once './dbconnect.php';
    $query = "SELECT * FROM users";
    $pdostatment = $pdo->prepare($query);
    $pdostatment->execute();
    $users = $pdostatment->fetchall(PDO::FETCH_ASSOC);
    $pdostatment->closeCursor();
    foreach ($users as $user) {
        if (
            $user['username'] === $_POST['username'] &&
            $user['password'] === $_POST['password']
        ) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['user_id'] = $user['id'];
            redirectToDashboard();
        } else {
            $error = "Identifiant ou Mot de passe incorrect !";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>E-learn V2 | Connexion</title>
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
            margin-top: 20px;
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
            <img src="./assets/img/image-1.png" alt="" class="image-1">
            <form id="registerForm" action="" method="post">
                <h3>Connexion</h3>
                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input type="text" class="form-control" placeholder="Nom d'utilisateur" id="username" name="username" required <?php if (isset($_POST['username'])) {
                                                                                                                                        echo 'value="' . $_POST['username'] . '"';
                                                                                                                                    } ?>>
                </div>
                <div class="error-message" id="usernameError"></div>

                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input type="password" class="form-control" placeholder="Mot de passe" id="password" name="password"
                        required>
                </div>
                <div class="error-message" id="passwordError"></div>
                <a href="./register.php">Pas encore inscrit ? &rarr;</a>
                <button type="submit">
                    <span>Se Connecter</span>
                </button>
                <?php if (isset($error)): ?>
                    <div class="error-message">
                        <?= $error; ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($_GET['n'])):
                ?>
                    <div class="new-register">
                        Votre compte à été bien créé, veuillez saisir vos identifiants
                    </div>
                <?php endif;
                ?>
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