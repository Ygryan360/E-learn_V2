<?php
require_once './functions.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/bootstrap.css" />
    <!-- FavIcons -->
    <link rel="shortcut icon" href="./assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/img/android-chrome-192x192.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicon-32x32.png" />
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="./assets/img/favicon-16x16.png" />
    <link rel="manifest" href="./assets/img/site.webmanifest" />
    <script src="./assets/js/main.js" defer></script>
    <title><?= $title ?> | E-learn V2</title>
</head>

<body>
    <!-- Nav bar -->
    <header class="d-flex flex-wrap justify-content-center p-3">
        <a href="./index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto m-2 link-body-emphasis text-decoration-none">
            <img src="./assets/img/android-chrome-192x192.png" alt="UL">
            <span class="fs-3">E-Learn V2</span>
        </a>
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="./index.php" class="nav-link active" aria-current="page">Accueil</a></li>
            <?php if (!returnLoggedStatus()): ?>
                <li class="nav-item"><a href="./login.php" class="nav-link">Se Connecter</a></li>
                <li class="nav-item"><a href="./register.php" class="nav-link">S'inscrire</a></li>
            <?php else: ?>
                <li class="nav-item"><a href="./dashboard.php" class="nav-link">Cours</a></li>
            <?php endif; ?>
        </ul>
    </header>