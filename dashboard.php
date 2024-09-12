<?php
session_start();
require_once './functions.php';
verifyLoggedStatus();
require_once 'dbconnect.php';
$query = "SELECT courses.id AS course_id, courses.name AS course_name, courses.description AS course_desc, courses.author_id , categories.name AS category FROM courses JOIN categories ON courses.category_id = categories.id ORDER BY `courses`.`id` DESC;";
$pdostatment = $pdo->prepare($query);
$pdostatment->execute();
$courses = $pdostatment->fetchall(PDO::FETCH_ASSOC);
$pdostatment->closeCursor();

$title = "Tableau de Bord";
// Header
require_once 'dashboard_header.php';
// sideBar
$dashboard = true;
require_once 'sidebar.php';
?>
<div class="album py-3">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($courses as $course): ?>
                <div class="col fade-in-up">
                    <div class="card course-shadow  h-100">
                        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="./assets/img/noimg.jpg">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5><a class="text-decoration-none" href="course.php?course=<?= $course['course_id'] ?>"><?= $course['course_name'] ?></a></h5>
                            <p class="card-text">
                                <?= $course['course_desc'] ?>
                            </p>
                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                <div class="btn-group">
                                    <a href="course.php?course=<?= $course['course_id'] ?>" class="btn btn-sm btn-outline-primary" id="lectureBtn">Lire</a>
                                    <?php if (isThisMyCourse($course['author_id']) || isAnAdmin()): ?>
                                        <a href="editcourse.php?course=<?= $course['course_id'] ?>" class="btn btn-sm btn-outline-primary" id="lectureBtn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                            </svg>
                                        </a>
                                        <a href="deletecourse.php?course=<?= $course['course_id'] ?>" class="btn btn-sm btn-outline-danger" id="lectureBtn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"></path>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"></path>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <small class="text-body-secondary"><?= $course['category'] ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="deleteModal<?php echo $count ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel">Attention !</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Voulez vous vraiment supprimer ce client ? <br />
                                Cette action sera irreversible !
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <a href="deleteclient.php?id=<?php echo $ligne['id_client']; ?>" class="btn btn-danger">Supprimer</a>
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
<?php require_once "./footer.php"; ?>