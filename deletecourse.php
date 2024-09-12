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
$ids = pdoFetchAssocWithQuery($getIdsQuery, $pdo);
// Vérifier si l'id de l'url correspond à un cours et l'utilisateur est un admin
if (!verifyId($ids, $course_id) || !isAnAdmin()) {
    redirectToDashboard();
}
