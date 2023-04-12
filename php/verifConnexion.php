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
/*                                  DEFINE                                      */

define("FILE_XML", "../data/user.xml");

/* **************************************************************************** */
/*                                  Function                                    */

/*!
 *  \fn function get_data_csv($file, $delimiter=';')
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Wed 12 April 2023 - 18:12:56
 *  \brief get data from a csv file
 *  \param $file        :  file to read
 *  \param $delimiter   :  delimiter of the file
 *  \return array       :  array of all users account
 *  \details
 *      in the return array, each line is an array of the line in the csv file
 *      [0] is the id
 *      [1] is the username
 *      [2] is the password
 *      [3] is the surname
 */
function get_data_xml($file = FILE_XML) {
    
    $xml = simplexml_load_file($file);
    
    $data = array();
    $i = 0;
    foreach ($xml as $user) {
        $data[$i] = array();
        $data[$i]['id'] = $user->id;
        $data[$i]['username'] = $user->username;
        $data[$i]['password'] = $user->password;
        $data[$i]['surname'] = $user->surname;
        $i++;
    }
    
    return ($data);
}

/* ---------------------------------------------------------------------------- */

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
    $data = get_data_xml("../data/user.xml");

    //var_dump($data);

    $i = 0;
    while ($data[$i]) {
        //var_dump($data[$i]['username']);
        if ($data[$i]['username'] == $username && $data[$i]['password'] == $password)
            return ($data[$i]);

        $i++;
    }

    return (null);
}

/* ---------------------------------------------------------------------------- */

/*!
 *  \fn function log_in($id)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Wed 12 April 2023 - 19:51:25
 *  \brief change the value of the connected attribute to true in the xml file
 *  \param $id      :  id of the user
 *  \param $file    :  file to write
 *  \return 0 if the function is successful, -1 otherwise
 */
function log_in($id, $file = FILE_XML) {
    
    $xml = simplexml_load_file($file);
    
    /* if the file is not found */
    if(!$xml)
        return (-1);

    $xml->user[(int) $id]->connected = "true";
    
    return (0);
}

/* **************************************************************************** */
/*                                  Main                                        */

session_start();

var_dump($_POST);

/* if the user is already connected, he is redirected to the home page */
if(isset($_SESSION['user_data']['id']))
    header('Location: index.php?error=already_connected');

/* if the user is not connected, we check if he is in the database */
if (isset($_POST['username']) && isset($_POST['password'])) {
    echo "test<br>" ;
    $arr = verif_connexion($_POST['username'], $_POST['password']);
    var_dump( $arr );
    /* if so we create the session and redirect him to the home page */
    if ($arr) {
        $_SESSION['user_data']['id'] = $arr['id'];
        $_SESSION['user_data']['surname'] = $arr['surname'];
        echo "IN  ". $arr['id']. "  <br>";
        log_in($arr['id']);
        //header('Location: index.php');
    }

    /* if not, we redirect him to the sign in page */
    else {
        echo "OUT";
        //header('Location: /html/connexion.php?error=wrong_username_or_password');
    }
    /* destroy the array w/ all data */
    unset($arr);
}
?>