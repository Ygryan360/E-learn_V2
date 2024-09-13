<?php
session_start();
require_once './functions.php';
verifyLoggedStatus();
if (!isset($_GET['course'])) {
    redirectToDashboard();
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
    redirectToDashboard();
}

// Si oui, afficher le cours
$query = "SELECT courses.id, courses.name, courses.description, courses.category_id, courses.update_date, courses.content, courses.vues, users.username FROM courses JOIN users ON courses.author_id = users.id WHERE courses.id = :id;";
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
    <div class="my-3 course-header d-flex  flex-wrap justify-content-between course-shadow">
        <h1><?= $course["name"]; ?></h1>
        <p>
            Créé par : <strong><?= $course["username"]; ?></strong> <br>
            Dernière mise à jour : <strong><?= $course["update_date"]; ?></strong>
        </p>
    </div>

</div>
<div class="my-3 p-4 container card fade-in-up overflow-scroll course-shadow">
    <?= $course["content"]; ?>
</div>
<?php
// Récuperer le nom de la catégorie
$getCategoryInfo = 'SELECT name FROM `categories` WHERE id = :id;';
$ctgstatment = $pdo->prepare($getCategoryInfo);
$ctgstatment->execute(['id' => $course["category_id"]]);
$ctgName = $ctgstatment->fetch();
$ctgstatment->closeCursor();

//MAJ des vues
$updateViewsQuery = "UPDATE courses SET vues = :views WHERE id = :id";
$pdostatmt1 = $pdo->prepare($updateViewsQuery);
$pdostatmt1->execute([
    "views" => $course['vues'] + 1,
    "id" => $course_id
]);
$pdostatmt1->closeCursor();
//Affichage de la vue MAJ
$viewsUpQuery = "SELECT vues FROM `courses` WHERE id = :id";
$pdostatmt2 = $pdo->prepare($viewsUpQuery);
$pdostatmt2->execute(["id" => $course_id]);
$viewMaj = $pdostatmt2->fetch();
$pdostatmt2->closeCursor();
?>
<div class="my-3 p-4 d-flex flex-wrap bg-blanc justify-content-between fade-in-up course-shadow">
    <p class="m-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-fill" viewBox="0 0 16 16">
            <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2" />
        </svg>
        <strong>Catégorie :</strong> <?= $ctgName['name'] ?>
    </p>
    <p class="m-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
        </svg>
        <strong><?= $viewMaj['vues'] ?></strong> vues
    </p>
</div>
</main>
</div>
</div>

<?php
require_once "./footer.php";
?>