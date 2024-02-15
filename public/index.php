<?php

require_once "../config.php";
require_once "../Modeles/informationsModel.php";



try {
    $db = new PDO(MY_DB_DRIVER . ":host=" . MY_DB_HOST . ";dbname=" . MY_DB_NAME . ";charset=" . MY_DB_CHARSET . ";port=" . MY_DB_PORT, MY_DB_LOGIN, MY_DB_PWD);
} catch (Exception $e) {
    die($e->getMessage());
}




    if (isset($_POST['themail'], $_POST['themessage'])) {

        $insert = addInformations($db, $_POST['themail'], $_POST['themessage']);
        if ($insert) {
            header("Location: ./");
            exit();
        } else {
            $message = "Erreur lors de l'insertion";
        }
    }

    $informations = getInformations($db);

    $content = 'informations.vue.html.php';

if(!empty($_GET['pg'])){
    switch($_GET['pg']){
        case 'getInfo':
            $content = 'getInformations.vue.html.php';
            break;
        default:
        $content = 'error404.php';
            break;
    }
}
// On inte/greimport le fichier html
// On fusionne le fichier avec index.php

include "../Vues/$content";

