<?php
/**
 * Cette fonction redirige l'utilisateur vers l'url contenu dans le paramètre
 */
function redirectToUrl(string $url) {
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