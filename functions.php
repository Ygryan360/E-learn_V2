<?php
date_default_timezone_set('UTC');

$roles = [
    'student',
    'teacher',
    'admin'
];

/**
 * Cette fonction redirige l'utilisateur vers l'url contenu dans le paramètre
 * @param string $url : L'adresse à laquelle l'utilisateur sera redirigé
 */
function redirectToUrl(string $url)
{
    header("Location: $url");
    exit();
}

/**
 * Redirige l'utilisateur vers le tableau de bord
 */
function redirectToDashboard()
{
    header('Location: dashboard.php');
    exit();
}

/**
 * Redirige l'utilisateur vers la page de connexion
 */
function redirectToLogin()
{
    header('Location: login.php');
    exit();
}

/**
 * Cette fonction vérifie si l'id de l'url est présent parmis les ids des catégories
 * @param array $allCategories : Le tableau contenant tous les ID
 * @param string $urlId : L'id contenu dans l'URL
 * @return bool true  si c'est trouvé
 */
function verifyCategory(array $allCategories, string $urlId): bool
{

    if ($allCategories['category_id'] == $urlId) {
        return true;
    }
    return false;
}

/**
 * Cette fonction vérifie si l'id de l'url est présent parmis les ids des cours
 * @param array $idsArray : Le tableau contenant tous les ids des cours
 * @param string $urlId : L'id contenu dans l'URL
 * @return bool true si l'id est valide
 */
function verifyId(array $idsArray, string $urlId): bool
{
    foreach ($idsArray as $idArray) {
        if ($idArray['id'] == $urlId) {
            return true;
        }
    }
    return false;
}

/**
 * Cette fonction vérifie si l'utilisateur est connecté. 
 * Si ce n'est pas le cas, il le renvoie vers la page de connexion
 */
function verifyLoggedStatus()
{
    if (
        !isset($_SESSION['username']) &&
        !isset($_SESSION['user_role']) &&
        !isset($_SESSION['user_id'])
    ) {
        redirectToLogin();
    }
}

/**
 * @return bool True si l'utilisateur est connecté et false sinon
 */
function returnLoggedStatus(): bool
{
    if (
        isset($_SESSION['username']) &&
        isset($_SESSION['user_role']) &&
        isset($_SESSION['user_id'])
    ) {
        return true;
    }
    return false;
}

/**
 * Verifie si l'utilisateur a le rôle teacher
 * @return bool True si valide
 */
function isATeacher(): bool
{
    if ($_SESSION['user_role'] === 'teacher') {
        return true;
    }
    return false;
}

/**
 * Verifie si l'utilisateur a le rôle d'admin
 * @return bool True si valide
 */
function isAnAdmin(): bool
{
    if ($_SESSION['user_role'] === 'admin') {
        return true;
    }
    return false;
}

/**
 * Verifie si l'utilisateur a le rôle de student
 * @return bool True si valide
 */
function isAStudent(): bool
{
    if ($_SESSION['user_role'] === 'student') {
        return true;
    }
    return false;
}

/**
 * Vérifie si la catégorie entrée par l'utilisateur exise déjà
 * @param array $existsCategories : Le tableau contenant toutes les catégories existantes
 * @param string $submitCategory : La catégorie soumise pas l'utilisateur
 * @return bool True si valide
 */
function verifyCategoryExist(array $existsCategories, string $submitCategory): bool
{
    foreach ($existsCategories as $existCategory) {
        if (strtolower($existCategory['name'])  === strtolower($submitCategory)) {
            return true;
        }
    }
    return false;
}

/**
 * Vérifie si les cours appartienent à l'utilisateur
 * @param array $coursesAuthors : Le tableau contenant tous les auteurs
 * @return bool True si valide
 */
function isThisMyCourses(array $coursesAuthors): bool
{
    foreach ($coursesAuthors as $courseAuthor) {
        if ($courseAuthor['author_id'] == $_SESSION['user_id']) {
            return true;
        }
    }
    return false;
}

/**
 * Vérifie si le cours appartient à l'utilisateur
 * @param string $auth_id : L'ID de l'auteur du cours
 * @return bool True si valide
 */
function isThisMyCourse(string $author_id): bool
{
    if ($author_id == $_SESSION['user_id']) {
        return true;
    }
    return false;
}

/**
 * Effectue une requête SQL et renvoie un Tableau Associatif
 * @param string $query : La requête qu'on doit executer
 * @param mixed $pdo : La varible PDO du fichier de connexion avec la DB
 * @return mixed Le tableau contenant toutes les données ou rien s'il s'agit d'une insertion
 */
function pdoFetchAssocWithQuery(string $query, mixed $pdo): mixed
{
    $getQueryArray = $pdo->prepare($query);
    $getQueryArray->execute();
    $arrayResult = $getQueryArray->fetchAll(PDO::FETCH_ASSOC);
    $getQueryArray->closeCursor();
    return $arrayResult;
}

/**
 * Vérifie si l'utilisateur est un auteur 
 * @param string $userId
 * @param array $coursesArray
 * @return bool True si il l'est
 */
function isAuthor(string $userId, array $coursesArray): bool
{
    foreach ($coursesArray as $course) {
        if ($course['author_id'] == $userId) {
            return true;
        }
    }
    return false;
}

/**
 * Réduit la taille des phrase avec la longueur souhaitée
 * @param string $words La chaine qui va estre réduite
 * @param int $length La taille souhaitée
 * @param string $ellipsis la chaine remplacent le superflu
 * @return string 
 */
function reduceWords(string $words, int $length = 30, string $ellipsis = '...'): string
{
    if (strlen($words) > $length) {
        return substr($words, 0, $length - strlen($ellipsis)) . $ellipsis;
    } else {
        return $words;
    }
}
