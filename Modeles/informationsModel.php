<?php
// Notre fonction qui charge les informations
function getInformations(PDO $db):array{
    $sql = "SELECT * FROM `informations`";
    $query = $db->query($sql);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $results;
}


// notre fonction qui insert dans informations



function addInformations(PDO $db, string $mail, string $message){
    $sql = "INSERT INTO `informations`(`themail`, `themessage`) VALUES(?,?)";
    $prepare = $db->prepare($sql);
    $prepare->bindValue(1,$mail,PDO::PARAM_STR);
    $prepare->bindValue(2,$message,PDO::PARAM_STR);
    $prepare->execute();
    $results = $prepare->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}
// Insertion d'un commentaire
function addComments(PDO $db, string $mail, string $message): bool|string
{
    /*
     * On récupère les données en assurant leur sécurité
     *
     * On utilise la fonction htmlspecialchars pour convertir les caractères spéciaux en entités HTML
     * Le paramètre ENT_QUOTES permet de convertir les guillemets doubles et simples
     * On utilise la fonction strip_tags pour supprimer les balises HTML et PHP
     * On utilise la fonction trim pour supprimer les espaces en début et fin de chaîne
     */

    
    // false si le courriel n'est pas valide, sinon on le garde
    $mail = filter_var($mail, FILTER_VALIDATE_EMAIL);
    
    $message = htmlspecialchars(strip_tags(trim($message)), ENT_QUOTES);

    // si les données ne sont pas valides, on envoie false
    if (empty($mail) || $mail === false || empty($message)) {
        return false;
    }
    // on prépare la requête
    $sql = "INSERT INTO comments (mail, message) VALUES ('$mail', '$message')";
    try {
        // on exécute la requête
        $db->exec($sql);
        // si tout s'est bien passé, on renvoie true
        return true;
    } catch (Exception $e) {
        // sinon, on renvoie le message d'erreur
        return $e->getMessage();
    }

}