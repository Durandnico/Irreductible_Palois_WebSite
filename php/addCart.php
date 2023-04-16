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

define("SHOP_DATAFILE", "../data/shop.json");

/* **************************************************************************** */
/*                                  Function                                    */



/* **************************************************************************** */
/*                                  Main                                        */

session_start();

if(!isset($_SESSION['cart']))
    $_SESSION['cart'] = array();

/* getting the product */
$find = false;
$cat = false;
foreach ($_SESSION['shop_data']['shop'] as $cat) {
    foreach( $cat as $product) {
        //var_dump($product);
        if ($product['name'] == $_POST['product']) {
            $find = $product;
            ;
            break;
        }
    }
}

/* checking if the product is in the shop */
if ($find == false) {
    echo "ERROR NO FIND";
    exit();
}

if($_POST['quantity'] > $find['quantity']) {
    echo "ERROR QUANTITY";
    exit();
}


/* changing the quantity */
(int) $_SESSION['shop_data']['shop'][$find['category']][$find['local-id']]['quantity'] -= (int) $_POST['quantity'];

/* changing the quantity in cart */
if(isset($_SESSION['cart'][$_POST['product']])) 
    (int) $_SESSION['cart'][$_POST['product']]['quantity'] += (int) $_POST['quantity'];


/* adding the product to the cart */
else {
    $_SESSION['cart'][$_POST['product']] = array();
    $_SESSION['cart'][$_POST['product']]['price'] = $_POST['price'];
    $_SESSION['cart'][$_POST['product']]['quantity'] = $_POST['quantity'];
    $_SESSION['cart'][$_POST['product']]['name'] = $_POST['product'];
    $_SESSION['cart'][$_POST['product']]['img'] = $_POST['img'];
}

/* saving the data */
/* for the moment, we do not save the data in the file
 * because we do not have the time to do it
 * but we save the data in the session
 *  
 * + (it's kinda buggy)
 * 
 * ps : we just have to uncomment the line below
 */  
//file_put_contents(SHOP_DATAFILE, json_encode($_SESSION['shop_data']));

echo "OK";

?>