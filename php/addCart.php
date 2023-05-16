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
/*                                  REQUIRE                                     */
require_once 'bdd.php';
Connexion();

/* **************************************************************************** */
/*                                  Main                                        */

session_start();

if(!isset($_SESSION['cart']))
    $_SESSION['cart'] = array();


/* getting the product */
$find = false;
$cat = false;
foreach ( getCategories() as $cat) {
    foreach( getProductByCategoryId($cat['id']) as $product) {
        if ($product['id'] == $_POST['id']) {
            $find = $product;
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
try {
    lowerStock($find['id'], $_POST['quantity']);
} catch (Exception $e) {
    echo $e->getMessage() . " in addCart.php - lowerStock()\n";
    exit();
}

/* changing the quantity in cart */
if(isset($_SESSION['cart'][$_POST['product']])) {
    /* localy */
    (int) $_SESSION['cart'][$_POST['product']]['quantity'] += (int) $_POST['quantity'];
    
    /* in the database */
    try {
        incCartStock($_SESSION['user_data']['id'], $find['id'], $_POST['quantity']);
    } catch (Exception $e) {
        echo $e->getMessage() . " in addCart.php - incCart()\n";
        exit();
    }

}


/* adding the product to the cart */
else {
    /* add localy */
    $_SESSION['cart'][$_POST['product']] = array();
    $_SESSION['cart'][$_POST['product']]['price'] = $_POST['price'];
    $_SESSION['cart'][$_POST['product']]['quantity'] = $_POST['quantity'];
    $_SESSION['cart'][$_POST['product']]['name'] = $_POST['product'];
    $_SESSION['cart'][$_POST['product']]['img'] = $_POST['img'];
    /* add in the database */
    try {
        addCart($_SESSION['user_data']['id'], $find['id'], $_POST['quantity']);
    } catch (Exception $e) {
        echo $e->getMessage() . " in addCart.php - addCart()\n";
        exit();
    }
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