<?php
// Notre fonction qui charge les informations
function getinformations(PDO $db)
{
    $sql = "SELECT * FROM informations ORDER BY thedate ASC";
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}


function addinformations(PDO $db, string $themail, string $themessage): bool|string
{

    $themail = filter_var($themail, FILTER_VALIDATE_EMAIL);
    $themessage = htmlspecialchars(strip_tags($themessage), ENT_QUOTES);

    if ($themail === false || empty ($themessage )) {
        return false;
        }

    $sql = "INSERT INTO informations ( themail, themessage) VALUES ('$themail', '$themessage')";
    try {
        $db->exec($sql);
        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }

}