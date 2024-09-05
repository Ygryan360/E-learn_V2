<?php
require_once 'dbconnect.php';
$query = "SELECT courses.id AS course_id, courses.name AS course_name, courses.description AS course_desc, categories.name AS category FROM courses JOIN categories ON courses.category_id = categories.id;";
$pdostatment = $pdo->prepare($query);
$pdostatment->execute();
$courses = $pdostatment->fetchall(PDO::FETCH_ASSOC);
$pdostatment->closeCursor();

$title = "Tableau de Bord";
// Header
require_once 'dashboard_header.php';
// sideBar
require_once 'sidebar.php';
?>
<!-- Cours -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-1 bg-second">
    <div class="album py-3">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($courses as $course): ?>
                    <div class="col fade-in-up">
                        <div class="card course-shadow">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="assets/img/noimg.jpg">
                            <div class="card-body">
                                <h5><a class="text-decoration-none" href="course.php?course=<?php echo $course['course_id'] ?>"><?php echo $course['course_name'] ?></a></h5>
                                <p class="card-text">
                                    <?php echo $course['course_desc'] ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" id="lectureBtn">Lire</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Editer</button>
                                    </div>
                                    <small class="text-body-secondary"><?php echo $course['category'] ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>
</div>
</div>

<?php
require_once "./footer.php"
?>