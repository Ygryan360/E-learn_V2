<?php
require_once 'dbconnect.php';
$query = "SELECT * FROM categories";
$pdostatment = $pdo->prepare($query);
$pdostatment->execute();
$categories = $pdostatment->fetchAll();
$pdostatment->closeCursor();

// var_dump($categories);
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
                <hr class="my-3">
                <h6
                    class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                    <span>Catégories :</span>
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
                            <svg class="bi">
                                <use xlink:href="#gear-wide-connected" />
                            </svg>
                            Paramètres
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2" href="#" data-bs-target="#exampleModal">
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