<?php
/* **************************************************************************** */
/*                                                                              */
/*                                                       ::::::::  :::   :::    */
/*   Project name                                       :+:    :+: :+:   :+:    */
/*                                                    +:+         +:+ +:+       */
/*   By: Durandnico <durandnico@cy-tech.fr>          +#+          +#++:         */
/*                                                 +#+           +#+            */
/*   Created: 16/04/2023 15:27:32 by Durandnico   #+#    #+#    #+#             */
/*                                                ########     ###              */
/*                                                                              */
/* **************************************************************************** */

/*! 
 *  \file addCart.php
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Sun 16 April 2023 - 15:27:32
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



/* **************************************************************************** */
/*                                  Main                                        */

session_start();

if(!isset($_SESSION['cart']))
    $_SESSION['cart'] = array();

var_dump($_POST);




?>