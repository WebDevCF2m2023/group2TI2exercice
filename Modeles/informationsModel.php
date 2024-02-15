<?php
// Notre fonction qui charge les informations
function getInformations(PDO $db): array
{
    $sql = "SELECT * FROM informations ORDER BY thedate DESC";
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

// notre fonction qui insert dans informations
function addInformations(PDO $db)
{
    
}