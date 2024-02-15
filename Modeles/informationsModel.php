<?php
// Notre fonction qui charge les informations
function getInformations(PDO $db): array
{
    $sql = "SELECT * FROM `informations` ORDER BY `thedate` ASC ";
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

// notre fonction qui insert dans informations
function addInformations(PDO $db, string $email, string $message): bool|string
{
    // gestion du format des variables
    $themail = filter_var($email, FILTER_VALIDATE_EMAIL); // vérifie le mail, le garde en sortie en cas de validité, renvoi false en cas de mail non valide
    $themessage = htmlspecialchars(strip_tags(trim($message)),ENT_QUOTES);

    // si un des champs est non valide
    if($themail===false || empty($themessage)){
        // arrêt du script et envoi du texte
        return "Au moins un des champs invalide";
    }

    $sql = "INSERT INTO `informations` (`themail`,`themessage`) VALUES ('$themail','$themessage')";
    try{
        $db->exec($sql);
        return true;
    }catch(Exception $e){
        return $e->getMessage();
    }
}