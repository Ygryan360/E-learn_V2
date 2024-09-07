<?php

/**
 * Cette fonction redirige l'utilisateur vers l'url contenu dans le paramètre
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
 * Retourne True si l'utilisateur est connecté et false sinon
 */
function returnLoggedStatus() :bool
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
 */
function isATeacher () :bool
{
    if($_SESSION['user_role'] === 'teacher'){
        return true;
    }
    return false;
}

/**
 * Verifie si l'utilisateur a le rôle d'admin
 */
function isAnAdmin () :bool
{
    if($_SESSION['user_role'] === 'admin'){
        return true;
    }
    return false;
}

/**
 * Verifie si l'utilisateur a le rôle de student
 */
function isAStudent () :bool
{
    if($_SESSION['user_role'] === 'student'){
        return true;
    }
    return false;
}
