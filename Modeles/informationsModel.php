<?php
// Notre fonction qui charge les informations
function getInformations(PDO $db)
{
    $sql = "SELECT * FROM Informations ORDER BY thedate ASC";
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

// notre fonction qui insert dans informations
function addInformations(PDO $db, string $themail, string $themessage, ): bool|string
{
    /*
     * On récupère les données en assurant leur sécurité
     *
     * On utilise la fonction htmlspecialchars pour convertir les caractères spéciaux en entités HTML
     * Le paramètre ENT_QUOTES permet de convertir les guillemets doubles et simples
     * On utilise la fonction strip_tags pour supprimer les balises HTML et PHP
     * On utilise la fonction trim pour supprimer les espaces en début et fin de chaîne
     */

    //$nom = htmlspecialchars(strip_tags(trim($)), ENT_QUOTES);
    // false si le courriel n'est pas valide, sinon on le garde
    $themail = filter_var($themail, FILTER_VALIDATE_EMAIL);
    $themessage = htmlspecialchars(strip_tags($themessage), ENT_QUOTES);
    

    // si les données ne sont pas valides, on envoie false
    if ($themail === false || empty($themessage)) {
        return false;
    }
    // on prépare la requête
    $sql = "INSERT INTO informations (themail, themessage) VALUES ('$themail', '$themessage')";
    try {
        // on exécute la requête
        $db->exec($sql);
        // si tout s'est bien passé, on renvoie true .
        return true;
    } catch (Exception $e) {
        // sinon, on renvoie le message d'erreur
        return $e->getMessage();
    }

}