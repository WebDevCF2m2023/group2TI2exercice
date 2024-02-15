<?php

// Chargement des dépendances
require_once "../config.php";
require_once "../Modeles/informationsModel.php";
// Connexion à la base de donnée
try {
    // création d'une instance de PDO - Connexion à la base de données
    $db = new PDO(MY_DB_DRIVER . ":host=" . MY_DB_HOST . ";dbname=" . MY_DB_NAME . ";charset=" . MY_DB_CHARSET . ";port=" . MY_DB_PORT, MY_DB_LOGIN, MY_DB_PWD);
} catch (Exception $e) {
    die($e->getMessage());
}
// Si le formulaire a été envoyé

    // On insert dans la table `informations` si valide
    if (isset($_POST['themail'], $_POST['themessage'])) {

        // on appelle la fonction d'insertion dans la DB
        $insert = addInformations($db, $_POST['themail'], $_POST['themessage']);
        // si l'insertion a réussi
        if ($insert) {
            // on redirige vers la page actuelle
            header("Location: ./");
            exit();
        } else {
            // sinon, on affiche un message d'erreur
            $message = "Erreur lors de l'insertion";
        }
    }
// on récupère toutes les entrées de la table
// `informations`
$informations = getInformations($db);
// on charge le template qui affiche la vue
include_once "../Vues/informations.vue.html.php";
// on ferme la connexion 