<?php

require_once './functions.php';
require_once 'dbconnect.php';
// Récuperer les cours
$query = "SELECT courses.id AS course_id, courses.name AS course_name, courses.description AS course_desc, categories.name AS category, courses.category_id AS category_id FROM courses JOIN categories ON courses.category_id = categories.id;";
$pdostatment = $pdo->prepare($query);
$pdostatment->execute();
$courses = $pdostatment->fetchall(PDO::FETCH_ASSOC);
$pdostatment->closeCursor();

// Récuperer le nom de la catégorie
$getCategoryInfo = 'SELECT name FROM `categories` WHERE id = :id;';
$ctgstatment = $pdo->prepare($getCategoryInfo);
$ctgstatment->execute(['id' => $_GET['category']]);
$ctgName = $ctgstatment->fetch();
$ctgstatment->closeCursor();
$category = $_GET['category'];
$title = $ctgName['name'];
// Header
require_once 'dashboard_header.php';
// sideBar
require_once 'sidebar.php';
?>
<div class="album py-3">
    <div class="container">
        <h1 class="text-center mb-3"><?= $ctgName['name'] ?></h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($courses as $course):
                if (verifyCategory($course, $_GET['category'])):
            ?>
                    <div class="col fade-in-up">
                        <div class="card course-shadow h-100">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="assets/img/noimg.jpg">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5><a class="text-decoration-none" href="course.php?course=<?= $course['course_id'] ?>"><?= $course['course_name'] ?></a></h5>
                                <p class="card-text">
                                    <?= $course['course_desc'] ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" id="lectureBtn">Lire</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Editer</button>
                                    </div>
                                    <small class="text-body-secondary"><?= $course['category'] ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php endif;
            endforeach; ?>
        </div>
    </div>
</div>
</main>
</div>
</div>

<?php
require_once "./footer.php"
?>