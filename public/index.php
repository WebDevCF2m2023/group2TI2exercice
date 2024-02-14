<?php

// Chargement des dépendances

// Connexion à la base de donnée

// Si le formulaire a été envoyé

    // On insert dans la table `informations` si valide

// on récupère toutes les entrées de la table
// `informations`

// on charge le template qui affiche la vue

// on ferme la connexion 


// Chargement des dépendances
require_once("../config.php");
require_once("../Modeles/informationsModel.php");

// Connexion à la base de donnée
$dsn = MY_DB_DRIVER.":host=".MY_DB_HOST.";dbname=".MY_DB_NAME.";charset=".MY_DB_CHARSET.";port=".MY_DB_PORT;
$db_connect = new PDO($dsn, MY_DB_LOGIN, MY_DB_PWD);

// Si le formulaire a été envoyé
if (!empty($_POST["mail"]) && !empty($_POST["message"])){
    // On insert dans la table `informations` si valide
    addInformations($db_connect, $_POST["mail"], $_POST["message"]);
}
// `informations`
$informations = getInformations($db_connect);

// on charge le template qui affiche la vue
include("../Vues/informations.vue.html.php");

// on ferme la connexion 
$db_connect = null;