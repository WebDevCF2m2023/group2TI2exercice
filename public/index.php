<?php

// Chargement des dépendances
require_once "../config.php";
require_once "../Modeles/informationsModel.php";
// pagination (option)
require_once "../Modeles/PaginationModel.php";
// Connexion à la base de donnée en PDO

try{
    $MyPDO = new PDO(MY_DB_DRIVER.":host=".MY_DB_HOST.";dbname=".MY_DB_NAME.";port=".MY_DB_PORT.";charset=".MY_DB_CHARSET, MY_DB_LOGIN, MY_DB_PWD);

}catch(Exception $e){
    die($e->getMessage());
}

// Si le formulaire a été envoyé
if(isset($_POST['themail'], $_POST['themessage'])){

    // On insert dans la table `informations` si valide
   $insert = addInformations($MyPDO,$_POST['themail'],$_POST['themessage']);
   // si on obtient une erreur
   //if(is_string($insert)) $message = $insert; 
   if($insert===true){
        $message = "Insertion réussie!";
   }else{
     $message = $insert;
   }
    /*
   // condition sans {} pour une ligne uniquement !
   if($insert===true) $message = "Insertion réussie!";
   elseif($insert="yep") $message ="lol"; // exemple de elsif
   else $message = $insert;
   // ternaire (binaire)
   $message = $insert===true ? "Insertion réussie!" : $insert;
   */
}




// nombre total d'informations
$nbInformations = getNbInformations($MyPDO);

// on veut une pagination
if(!empty($_GET[PAGINATION_GET_NAME]) && ctype_digit($_GET[PAGINATION_GET_NAME])){
    $page = (int) $_GET[PAGINATION_GET_NAME];
}else{
    $page = 1;
}

// on récupère toutes les entrées de la table
// `informations` avec Pagination
$informations = getPaginationInformations($MyPDO,$page,PAGINATION_NB_PAGE);
 //var_dump($_GET);

$pagination = PaginationModel("./",PAGINATION_GET_NAME,$nbInformations,$page,PAGINATION_NB_PAGE);

// on charge le template qui affiche la vue
include "../Vues/informations.vue.html.php";

// on ferme la connexion 
$MyPDO = null;