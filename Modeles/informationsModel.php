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

// Notre fonction qui charge le nombre d'informations
function getNbInformations(PDO $db): int
{
    $sql = "SELECT COUNT(*) as nb FROM `informations` ORDER BY `thedate` ASC ";
    $query = $db->query($sql);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result['nb'];
}
// fonction qui charge les informations avec pagination
function getPaginationInformations(PDO $db, int $currentPage,int $nbPerPage): array
{
    $offset = ($currentPage-1)*$nbPerPage;
    $sql = "SELECT * FROM `informations` ORDER BY `thedate` ASC LIMIT $offset, $nbPerPage ";
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
    
    // Entrées utilisateurs -> requêtes préparées
    /*$sql = "INSERT INTO `informations` (`themail`,`themessage`) VALUES (?,?)";
    $prepare = $db->prepare($sql);
    $prepare->bindValue(1,$themail,PDO::PARAM_STR);
    $prepare->bindValue(2,$themessage,PDO::PARAM_STR);
    try{
        $prepare->execute();
        return true;
    }catch(Exception $e){
        return $e->getMessage();
    }*/

    /*$prepare = $db->prepare("INSERT INTO `informations` (`themail`,`themessage`) VALUES (?,?)");
    try{
        $prepare->execute([$themail,$themessage]);
        return true;
    }catch(Exception $e){
        return $e->getMessage();
    }*/
}