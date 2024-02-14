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
    $prepare->bindValue(1,htmlspecialchars($mail),PDO::PARAM_STR);
    $prepare->bindValue(2,htmlspecialchars($message),PDO::PARAM_STR);
    $prepare->execute();
    $prepare->closeCursor();
}