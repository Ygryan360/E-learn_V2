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
 * Cette fonction vérifie si l'id de l'url est présent parmis les ids des catégories
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
        $url = "login.php";
        redirectToUrl($url);
    }
}
