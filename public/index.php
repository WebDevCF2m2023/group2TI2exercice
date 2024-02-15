<?php
// public/index.php

require_once "../Modeles/informationsModel.php";

// Créer une instance du modèle
$informationsModel = new InformationsModel($db); // $db est votre connexion à la base de données

// Vérifier l'action à effectuer
if(isset($_POST['action'])) {
    $action = $_POST['action'];

    if($action === 'addInformation') {
        // Vérifier si les données du formulaire sont présentes
        if(isset($_POST['email']) && isset($_POST['message'])) {
            // Récupérer les données du formulaire
            $email = $_POST['email'];
            $message = $_POST['message'];

            // Ajouter l'information en base de données
            $result = $informationsModel->addInformations($email, $message);

            // Vérifier si l'ajout a réussi
            if($result) {
                // Redirection vers la page d'accueil
                header("Location: ../Vues/informations.vue.html.php");
                exit();
            } else {
                // Afficher une erreur
                echo "Une erreur est survenue lors de l'ajout de l'information.";
            }
        } else {
            // Afficher une erreur si des champs sont manquants
            echo "Tous les champs sont obligatoires.";
        }
    }
}

// Récupérer les informations à afficher
$informations = $informationsModel->getInformations();

// Inclure la vue
include "../Vues/informations.vue.html.php";
?>