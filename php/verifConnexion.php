<?php

/* **************************************************************************** */
/*                                                                              */
/*                                                       ::::::::  :::   :::    */
/*   IR Website                                         :+:    :+: :+:   :+:    */
/*                                                    +:+         +:+ +:+       */
/*   By: Durandnico <durandnico@cy-tech.fr>          +#+          +#++:         */
/*                                                 +#+           +#+            */
/*   Created: 12/04/2023 18:08:52 by Durandnico   #+#    #+#    #+#             */
/*                                                ########     ###              */
/*                                                                              */
/* **************************************************************************** */

/*! 
 *  \file verifConnexion.php
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Wed 12 April 2023 - 18:08:52
 *
 *  \brief 
 *      This file is used to verify if the user is in the database (file for the moment).
 *      If he is not, he is redirected to the sign in page.
 *      If he is, he is redirected to the home page.
 *
 */


/* **************************************************************************** */
/*                                  INCLUDE                                     */

require_once 'bdd.php';

/* **************************************************************************** */
/*                                  Function                                    */

/*!
 *  \fn function verif_connexion($username, $password)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Wed 12 April 2023 - 18:15:59
 *  \brief verify if the user is in the database
 *  \param $username    :  username of the user
 *  \param $password    :  password of the user
 *  \return the arr with all data surname if he is in the database, null otherwise 
 */
function verif_connexion($username, $password) {

    try {
        $data = getAllUsers();
    } catch (Exception $e) {
        echo $e->getMessage() . " in verifConnexion.php - verif_connexion()\n";
        exit();
    }

    $i = 0;
    while ($data[$i]) {
        if ($data[$i]['login'] == $username && $data[$i]['password'] == $password)
            return ($data[$i]);

        $i++;
    }

    return (null);
}

/* **************************************************************************** */
/*                                  Main                                        */

session_start();

if (!isBddConnected())
    Connexion();
    
/* if the user is already connected, he is redirected to the home page */
if(isset($_SESSION['user_data']['inscription']))
{
    unset($_SESSION['user_data']['inscription']);
    header('Location: /index.php?error=already_connected');
    exit();
}

/* if the user is not connected, we check if he is in the database */
if (isset($_POST['username']) && isset($_POST['password'])) {
    $arr = verif_connexion($_POST['username'], $_POST['password']);
    
    /* if so we create the session and redirect him to the home page */
    if ($arr != null) {

        /* we create the session variable */
        $_SESSION['user_data']['id'] = (int) $arr['id'];
        $_SESSION['user_data']['surname'] = (string) $arr['surname'];
        $_SESSION['user_data']['admin'] = is_admin((int) $arr['id']);
        /* we change the value of the connected attribute to true */
        try {
            loginUserById((int)($arr['id']));
        } catch (Exception $e) {
            header('Location: /pages/connexion.php?error=' . $e->getMessage());
            exit();
        }
            
        header('Location: /index.php?success=signIn');
    }

    /* if not, we redirect him to the sign in page */
    else {
        header('Location: /pages/connexion.php?error=wrong_username_or_password');
    }

    /* destroy the array w/ all data */
    unset($arr);
}

/* if there are no POST var, we head to connexion */
else {
    header('Location: /pages/connexion.php?error=form_not_filled');
}
?>