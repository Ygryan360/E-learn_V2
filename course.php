<?php

require_once './functions.php';
$redirectUrl = "dashboard.php";
if (!isset($_GET['course'])) {
    redirectToUrl($redirectUrl);
}
$course_id = $_GET['course'];
// Récuperer toutes les ids des cours
require_once 'dbconnect.php';
$getIdsQuery = "SELECT id FROM courses;";
$getIdsStatment = $pdo->prepare($getIdsQuery);
$getIdsStatment->execute();
$ids = $getIdsStatment->fetchAll(PDO::FETCH_ASSOC);
$getIdsStatment->closeCursor();
// Vérifier si l'id de l'url correspond à un cours
if (!verifyId($ids, $course_id)) {
    redirectToUrl($redirectUrl);
}
// Si oui, afficher le cours
$query = "SELECT * FROM courses WHERE courses.id = :id";
$pdostatment = $pdo->prepare($query);
$pdostatment->execute(['id' => $course_id]);
$course = $pdostatment->fetch(PDO::FETCH_ASSOC);
$pdostatment->closeCursor();

$title = $course["name"];
//header
require_once 'dashboard_header.php';
// sideBar
require_once 'sidebar.php';
?>
<div class="d-flex-space-betwean">
    <h1 class="text-center mt-5 mb-4 fw-bold fs-1"><?= $course["name"]; ?></h1>

</div>
<div class="my-3 p-4 container card fade-in-up course-shadow">
    <?= $course["content"]; ?>
</div>
</main>
</div>
</div>

<?php
require_once "./footer.php";
?>