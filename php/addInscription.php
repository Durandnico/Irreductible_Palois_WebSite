<?php

/* **************************************************************************** */
/*                                                                              */
/*                                                       ::::::::  :::   :::    */
/*   IR Website                                         :+:    :+: :+:   :+:    */
/*                                                    +:+         +:+ +:+       */
/*   By: Durandnico <durandnico@cy-tech.fr>          +#+          +#++:         */
/*                                                 +#+           +#+            */
/*   Created: 12/04/2023 20:20:40 by Durandnico   #+#    #+#    #+#             */
/*                                                ########     ###              */
/*                                                                              */
/* **************************************************************************** */

/*! 
 *  \file addInscription.php
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Wed 12 April 2023 - 20:20:40
 *
 *  \brief 
 *
 *
 */


/* **************************************************************************** */
/*                                  DEFINE                                      */

define("FILE_XML", "../data/user.xml");

/* **************************************************************************** */
/*                                  Function                                    */


/*!
 *  \fn function check_user($username, $file = FILE_XML)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Wed 12 April 2023 - 20:22:07
 *  \brief check if the username is already in the database
 *  \param $username    :  username to check
 *  \param $file        :  file to read
 *  \return false if the username is not in the database or true if it is
 *  \remarks 
 */
function check_user($username, $file = FILE_XML) {

    $xml = simplexml_load_file($file);

    foreach ($xml->user as $user) 
        if ($user->username == $username)
            return true;

    return false;
}

/*!
 *  \fn function add_user($id, $username, $password, $surname, $file = FILE_XML)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Wed 12 April 2023 - 20:23:51
 *  \brief 
 *  \param
 *  \return 
 *  \remarks 
 */
function add_user($id, $username, $password, $surname, $file = FILE_XML) {
    
    $xml = simplexml_load_file($file);

    $user = $xml->addChild('user');
    $user->addChild('id', $id);
    $user->addChild('username', $username);
    $user->addChild('password', $password);
    $user->addChild('surname', $surname);
    $user->addChild('connected', 'true');

    $xml->asXML($file);

    return ( check_user($username, $file) );

}

/* **************************************************************************** */
/*                                  Main                                        */

session_start();

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['surname'])) {
    
    
    if (check_user($_POST['username'])) {
        echo "Username already used";
        header("Location: /html/connexion.php?error=username_already_used");
        exit();
    }

    $xml = simplexml_load_file(FILE_XML);

    if (add_user( count($xml->user) , $_POST['username'], $_POST['password'], $_POST['surname'])) {
        echo "User added";
        
        /* add to the user sesion */
        $_SESSION['user_data']['inscription'] = true;
        $_SESSION['user_data']['id'] = count($xml->user) + 1;
        $_SESSION['user_data']['surname'] = $_POST['surname'];

        header("Location: /php/verifConnexion.php");
        exit();
    } 

    echo "Error";
    header("Location: /html/connexion.php?error=error_add_user");
}

?>