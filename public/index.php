<?php

// Chargement des dépendances
require_once "../config.php";
require_once "../Modeles/informationsModel.php";
// Connexion à la base de donnée en PDO

try{
    $MyPDO = new PDO(MY_DB_DRIVER.":host=".MY_DB_HOST.";dbname=".MY_DB_NAME.";port=".MY_DB_PORT.";charset=".MY_DB_CHARSET, MY_DB_LOGIN, MY_DB_PWD);

}catch(Exception $e){
    die($e->getMessage());
}

// Si le formulaire a été envoyé

    // On insert dans la table `informations` si valide

// on récupère toutes les entrées de la table
// `informations`
$informations = getInformations($MyPDO);
$nbInformations = count($informations);

// on charge le template qui affiche la vue
include "../Vues/informations.vue.html.php";

// on ferme la connexion 