<?php

/* **************************************************************************** */
/*                                                                              */
/*                                                       ::::::::  :::   :::    */
/*   IR Website                                         :+:    :+: :+:   :+:    */
/*                                                    +:+         +:+ +:+       */
/*   By: Durandnico <durandnico@cy-tech.fr>          +#+          +#++:         */
/*                                                 +#+           +#+            */
/*   Created: 11/04/2023 00:10:07 by Durandnico   #+#    #+#    #+#             */
/*                                                ########     ###              */
/*                                                                              */
/* **************************************************************************** */

/*! 
 *  \file verifForm.php
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Tue 11 April 2023 - 00:10:07
 *
 *  \brief 
 *          verifForm.php
 *          This file is part of the project "Irréductibles Palois website".
 *          This file is used to verify the form.
 *          This are transcription of the function in the file "verif.js".
 * 
 *
 */

/* **************************************************************************** */
/*                                  DEFINE                                    */

define("EMPTY_STRING", "");
define("VALID_MAIL", "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/");
define("VALID_NAME", "/^[a-zA-Z]+$/");
define("VALID_DATE", "/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/");



/* **************************************************************************** */
/*                                  FUNCTION                                    */

/*!
 *  \fn function not_in_the_future($date)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Tue 11 April 2023 - 00:23:30
 *  \brief verify if the date is not in the future
 *  \param $date:   date to verify
 *  \return true if the date is not in the future, false otherwise
 *  \remarks it really piss me off to have different date format everywhere
 */
function not_in_the_future($date) {
    
    $date = explode("-", $date);
    $date = mktime(0, 0, 0, $date[2], $date[1], $date[0]);
    $today = mktime(0, 0, 0, date("m"), date("d"), date("Y"));

    if ($date <= $today)
        return (true);

    return (false);
}

/* **************************************************************************** */
/*                                  MAIN                                    */

var_dump($_POST);
if(! isset($_POST['submit']))
{
    header("Location: /html/contact.php?error=form_not_filled");
    exit();
}

$valid  =   /* check if not empty */
            $_POST['prenom'] != EMPTY_STRING
            && $_POST['nom'] != EMPTY_STRING
            && $_POST['email'] != EMPTY_STRING
            && $_POST['birthday'] != EMPTY_STRING
            && $_POST['message'] != EMPTY_STRING
            && $_POST['subject'] != EMPTY_STRING

            /* check if valid */
            && preg_match(VALID_MAIL, $_POST['email'])
            && preg_match(VALID_NAME, $_POST['nom'])
            && preg_match(VALID_NAME, $_POST['prenom'])
            && preg_match(VALID_DATE, $_POST['birthday'])
            && not_in_the_future($_POST['birthday'])
            && isset($_POST['genre'])
            && $_POST['job'] != "choix";

if ($valid) {
    mail(
        "durandnico@cy-tech.fr",
        $_POST['subject'],
        $_POST['message']
        . "\r\nDe :". $_POST['email']
        . "\r\nNom :" . $_POST['nom']
        . "\r\nPrénom :" . $_POST['prenom']
        . "\r\nDate de naissance :" . $_POST['birthday']
        . "\r\nGenre :" . $_POST['genre']
        . "\r\nProfession :" . $_POST['job'],
    );
}

//Header('Location: /html/contact.php?birthday=' . $_POST['birthday'] .'&nom=' . $_POST['nom'] . '&prenom=' . $_POST['prenom'] .'&email='. $_POST['email'] .'&genre=' . $_POST['genre'] . '&job=' . $_POST['job'] . '&subject=' . $_POST['subject'] .'&message=' . $_POST['message']);

?>