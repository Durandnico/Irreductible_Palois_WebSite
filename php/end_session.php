<?php
    session_start();
    require_once 'bdd.php';
    if( !isBddConnected())
        try {
            Connexion();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    echo "Déconnexion de l'utilisateur...";
    echo $_SESSION['user_data']['id'];
    try{
        logoutUserById($_SESSION['user_data']['id']);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    
    echo "Déconnexion en cours...";
    
    try {
        Deconnexion();
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    echo "Déconnexion réussie";

    if( !session_destroy())
    {
        echo "Erreur lors de la déconnexion";
        exit();
    }

    echo "Redirection vers la page d'accueil...";

    Header("Location: /index.php");
?>