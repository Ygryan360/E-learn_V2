<?php
/**
 * Cette fonction vérifie si l'id de l'url est présent parmis les ids des cours
 */
function verifyId(array $idsArr, string $id):bool{
    foreach($idsArr as $idN){
        if($idN['id'] === $id){
            return true;
        }
    }
    return false;
}
if(!isset($_GET['course'])) {
    header("Location: ./dashboard.php");
    exit();
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
if (!verifyId($ids, $course_id)){
    header("Location: ./dashboard.php");
    exit();
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

<!-- Cours -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-second">
    <div class="my-3 p-4 container card fade-in-up course-shadow">
        <h2><?= $course["name"]; ?></h2>
        <?= $course["content"]; ?>
    </div>
</main>
</div>
</div>

<?php
require_once "./footer.php";
?>
