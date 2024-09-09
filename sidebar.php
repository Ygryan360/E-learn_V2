<?php
require_once 'dbconnect.php';
$query = "SELECT * FROM categories";
$pdostatment = $pdo->prepare($query);
$pdostatment->execute();
$categories = $pdostatment->fetchAll();
$pdostatment->closeCursor();
?>
<div class="sidebar border border-right col-md-3 col-lg-2 p-0">
    <div class="offcanvas-md offcanvas-end" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">E-Learn V2</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="dashboard.php">
                        <svg class="bi">
                            <use xlink:href="#house-fill" />
                        </svg>
                        Tableau de bord
                    </a>
                </li>
                <?php if (!isAStudent()): ?>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="./addcourse.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                                <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5" />
                                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                            </svg>
                            Ajouter un cours
                        </a>
                    </li>
                <?php endif; ?>
                <hr class="my-3">
                <h6
                    class=" d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-body-secondary text-uppercase">
                    <span class="fw-semiboldx">Catégories</span>
                    <?php if (!isAStudent()): ?>
                        <a href="./addcategory.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5z" />
                            </svg>
                        </a>
                    <?php endif ?>
                </h6>
                <ul class="nav flex-column mb-auto">
                    <?php foreach ($categories as $category): ?>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="categories.php?category=<?= $category['id'] ?>">
                                <svg class="bi">
                                    <use xlink:href="#file-earmark-text" />
                                </svg>
                                <?= $category['name'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <hr class="my-3">


                <ul class="nav flex-column mb-auto">

                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                            </svg>
                            <?= $_SESSION['username'] ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2" href="#">
                            <svg class="bi">
                                <use xlink:href="#gear-wide-connected" />
                            </svg>
                            Paramètres
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2" href="./logout.php">
                            <svg class="bi">
                                <use xlink:href="#door-closed" />
                            </svg>
                            Se déconnecter
                        </a>
                    </li>
                </ul>
        </div>
    </div>
</div>

<!-- Cours -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-second min-vh-100">