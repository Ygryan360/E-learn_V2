<?php
session_start();
+require_once './functions.php';
verifyLoggedStatus();
if (!isAnAdmin()) {
    redirectToDashboard();
}

require_once './dbconnect.php';
//Récupérer tous les utilisateurs
$getAllUsersQuery = "SELECT * FROM users";
$allUsers = pdoFetchAssocWithQuery($getAllUsersQuery, $pdo);
$totalUsers = count($allUsers);
// Récupérer tous les cours
$getAllCoursesQuery = "SELECT * FROM courses";
$allCourses = pdoFetchAssocWithQuery($getAllCoursesQuery, $pdo);
$totalCourses = count($allCourses);
// Récupérer toutes les catégories
$getAllCategoriesQuery = "SELECT * FROM categories";
$allCategories = pdoFetchAssocWithQuery($getAllCategoriesQuery, $pdo);
$totalCategories = count($allCategories);
// calculer le total des vues
$totalViews = 0;
foreach ($allCourses as $course) {
    $totalViews += $course['vues'];
}

$title = "Admin Panel";
// Header
require_once 'dashboard_header.php';
// sideBar
$adminpanel = true;
require_once 'sidebar.php';
?>
<div class="album py-3">
    <div class="container">
        <!-- OverView -->
        <section>
            <div class="d-flex justify-content-between">
                <h3>Dashboard </h3>

            </div>
            <div class="row row-cols-1 row-cols-md-5 justify-content-between ">
                <div class="col course-shadow card py-2">
                    <div class="d-flex fs-3 justify-content-between align-items-center">
                        <div class="fw-medium">Utilisateurs</div>
                        <div class="admin-item-container">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-lines-fill admin-item" viewBox="0 0 16 16">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z" />
                            </svg>
                        </div>
                    </div>
                    <h4>
                        <?= $totalUsers ?>
                    </h4>
                </div>
                <div class="col card course-shadow py-2">
                    <div class="d-flex fs-3 justify-content-between align-items-center">
                        <div class="fw-medium">Cours</div>

                        <div class="admin-item-container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text-fill admin-item" viewBox="0 0 16 16">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                            </svg>
                        </div>
                    </div>
                    <h4>
                        <?= $totalCourses ?>
                    </h4>
                </div>
                <div class="col course-shadow card py-2">
                    <div class="d-flex fs-3 justify-content-between align-items-center">
                        <div class="fw-medium">Catégories</div>

                        <div class="admin-item-container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks-fill admin-item" viewBox="0 0 16 16">
                                <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5z" />
                                <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1z" />
                            </svg>
                        </div>
                    </div>
                    <h4>
                        <?= $totalCategories ?>
                    </h4>
                </div>
                <div class="col course-shadow card py-2">
                    <div class="d-flex fs-3 justify-content-between align-items-center">
                        <div class="fw-medium">Vues</div>

                        <div class="admin-item-container">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-eye-fill admin-item" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                            </svg>
                        </div>
                    </div>
                    <h4>
                        <?= $totalViews ?>
                    </h4>
                </div>
            </div>
        </section>
        <!-- Gestion des utilisateurs -->
        <section>
            <div class="mt-5 mb-2 p-1 d-flex justify-content-between">
                <h3>
                    Utilisateurs
                </h3>
                <a href="./adduser.php" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
                    </svg>
                </a>
            </div>
            <div class="course-shadow py-3 px-2 bg-blanc">
                <table id="usersTable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="fw-bold fs-5">ID</th>
                            <th class="fw-bold fs-5">Username</th>
                            <th class="fw-bold fs-5">E-mail</th>
                            <th class="fw-bold fs-5">Telephone</th>
                            <th class="fw-bold fs-5">Role</th>
                            <th class="fw-bold fs-5">Date d'inscription</th>
                            <th class="fw-bold fs-5">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allUsers as $anUser): ?>
                            <tr>
                                <td><?= $anUser['id'] ?></td>
                                <td><?= $anUser['username'] ?></td>
                                <td><?= $anUser['email'] ?></td>
                                <td><?= $anUser['phone'] ?></td>
                                <td><?= $anUser['role'] ?></td>
                                <td><?= $anUser['register_date'] ?></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="./edituser.php?u=<?= $anUser['id'] ?>" class="btn btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"></path>
                                            </svg>
                                            Modifier
                                        </a>
                                        <button type="button" class="btn btn-outline-danger" <?php echo (isAuthor($anUser['id'], $allCourses)) ? "disabled" : "" ?>>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"></path>
                                            </svg>
                                            Supprimer
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </section>
        <!-- Gestion des cours -->
        <section>
            <div class="mt-5 mb-2 p-1 d-flex justify-content-between">
                <h3>
                    Cours
                </h3>
                <a href="./addcourse.php" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0" />
                    </svg>
                </a>
            </div>
            <div class="course-shadow py-3 px-2 bg-blanc">
                <table id="usersTable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="fw-bold fs-5">ID</th>
                            <th class="fw-bold fs-5">Titre</th>
                            <th class="fw-bold fs-5">Description</th>
                            <th class="fw-bold fs-5">Categorie ID</th>
                            <th class="fw-bold fs-5">Auteur ID</th>
                            <th class="fw-bold fs-5">Date </th>
                            <th class="fw-bold fs-5">Vues</th>
                            <th class="fw-bold fs-5">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allCourses as $aCourse): ?>
                            <tr>
                                <td><?= $aCourse['id'] ?></td>
                                <td><?= reduceWords($aCourse['name']) ?></td>
                                <td><?= reduceWords($aCourse['description'])  ?></td>
                                <td><?= $aCourse['category_id'] ?></td>
                                <td><?= $aCourse['author_id'] ?></td>
                                <td><?= $aCourse['update_date'] ?></td>
                                <td><?= $aCourse['vues'] ?></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="./edituser.php?u=<?= $anUser['id'] ?>" class="btn btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"></path>
                                            </svg>
                                            Modifier
                                        </a>
                                        <button type="button" class="btn btn-outline-danger" <?php echo (isAuthor($anUser['id'], $allCourses)) ? "disabled" : "" ?>>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"></path>
                                            </svg>
                                            Supprimer
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </section>
        <!-- Gestion des catégories -->
        <section>
            <div class="mt-5 mb-2 p-1 d-flex justify-content-between">
                <h3>Catégories</h3>
                <a href="./addcategory.php" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5z" />
                    </svg>
                </a>
            </div>
            <div class="course-shadow py-3 px-2 bg-blanc">
                <table id="usersTable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="fw-bold fs-5">ID</th>
                            <th class="fw-bold fs-5">Nom</th>
                            <th class="fw-bold fs-5">Description</th>
                            <th class="fw-bold fs-5">Date</th>
                            <th class="fw-bold fs-5">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allCategories as $aCategory): ?>
                            <tr>
                                <td><?= $aCategory['id'] ?></td>
                                <td><?= reduceWords($aCategory['name']) ?></td>
                                <td><?= reduceWords($aCategory['description'])  ?></td>
                                <td><?= $aCategory['added_date'] ?></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="./editcategory.php?category=<?= $aCategory['id'] ?>" class="btn btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"></path>
                                            </svg>
                                            Modifier
                                        </a>
                                        <button type="button" class="btn btn-outline-danger" <?php echo (isAuthor($anUser['id'], $allCourses)) ? "disabled" : "" ?>>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"></path>
                                            </svg>
                                            Supprimer
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
</main>
</div>
</div>
<?php require_once "./footer.php"; ?>