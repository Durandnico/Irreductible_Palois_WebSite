<?php
/* **************************************************************************** */
/*                                                                              */
/*                                                       ::::::::  :::   :::    */
/*   IR_Website                                         :+:    :+: :+:   :+:    */
/*                                                    +:+         +:+ +:+       */
/*   By: Durandnico <durandnico@cy-tech.fr>          +#+          +#++:         */
/*                                                 +#+           +#+            */
/*   Created: 05/05/2023 10:21:25 by Durandnico   #+#    #+#    #+#             */
/*                                                ########     ###              */
/*                                                                              */
/* **************************************************************************** */

/*! 
 *  \file bdd.php
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Fri 05 May 2023 - 10:21:25
 *
 *  \brief contains all the functions to interact with the database
 *
 *
 */


/* **************************************************************************** */
/*                                  INCLUDES                                    */

require_once("bddData.php");


/* **************************************************************************** */
/*                                  GLOBAL VAR                                  */

$bdd = NULL;

/* **************************************************************************** */
/*                                  Function                                    */

/*!
 *  \fn function Connexion()
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Fri 05 May 2023 - 10:22:30
 *  \brief connect to the database
 *  \return true if the connexion is open, false otherwise (return the error if the connexion failed)
 *  \remarks --
 */
function Connexion() {
    global $bdd;
    
    $bdd = mysqli_connect(HOST, USER, PASS, DB);

    if ($bdd == false)
        throw new Exception(mysqli_connect_error());

    return (true);
}

/* -------------------------------------------------------------------------- */

/*!
 *  \fn function Deconnexion()
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Fri 05 May 2023 - 10:27:52
 *  \brief disconnect from the database
 *  \return true if the connexion is closed, false otherwise (if the connexion is not open)
 *  \remarks need to call Connexion() before
 */
function Deconnexion() {
    global $bdd;

    if ($bdd == NULL)
        throw new Exception("bdd not connected");

    mysqli_close($bdd);

    return (true);
}

/* -------------------------------------------------------------------------- */

/*!
 *  \fn function getCategories()
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Fri 05 May 2023 - 10:34:04
 *  \brief get all the categories from the database
 *  \return an array of all the categories
 *  \remarks --
 */
function getCategories() {
    global $bdd;

    if ($bdd == NULL)
        throw new Exception("bdd not connected");

    $query = "SELECT * FROM Category";
    $result = mysqli_query($bdd, $query);

    if ($result == false)
        return (false);

    $categories = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }

    return ($categories);
}

/* -------------------------------------------------------------------------- */

/*!
 *  \fn function getProductByCategory($category)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Fri 05 May 2023 - 10:38:24
 *  \brief get all the products from a category
 *  \param $category the category to get the products from
 *  \return an array of all the products from the category
 *  \remarks --
 */
function getProductByCategoryId($idcategory) {
    global $bdd;

    if ($bdd == NULL)
        throw new Exception("bdd not connected");

    $query = "SELECT * FROM Product WHERE idCategory = $idcategory";
    $result = mysqli_query($bdd, $query);

    if ($result == false)
        throw new Exception("query failed");
    
    $products = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }

    return ($products);
}

/* -------------------------------------------------------------------------- */

/*!
 *  \fn function lowerStock($id, $quantity)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Fri 05 May 2023 - 10:40:55
 *  \brief lower the stock of a product
 *  \param $id        : the id of the product
 *  \param $quantity  : the quantity to lower
 *  \return true if the stock is lowered, false otherwise
 *  \remarks --
 */
function lowerStock($id, $quantity) {
    global $bdd;

    if ($bdd == NULL)
        throw new Exception("bdd not connected");

    /* check if the stock is enough */
    $product = getProductById($id);
    if ($product['stock'] < $quantity)
        throw new Exception("Not enough stock");

    $query = "UPDATE Product SET stock = stock - '$quantity' WHERE id = '$id'";
    $result = mysqli_query($bdd, $query);

    if ($result == false)
        return (false);

    return (true);
}

/* -------------------------------------------------------------------------- */

/*!
 *  \fn function getProductById($id)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Fri 05 May 2023 - 10:52:52
 *  \brief get a product from its id
 *  \param $id  : the id of the product
 *  \return the product
 *  \remarks --
 */
function getProductById($id) {
    global $bdd;

    if($bdd == NULL)
        throw new Exception("bdd not connected");

    $query = "SELECT * FROM Product WHERE id = '$id'";
    $result = mysqli_query($bdd, $query);

    if ($result == false)
        return (false);
        
    $product = mysqli_fetch_assoc($result);

    return ($product);
}

/* -------------------------------------------------------------------------- */

/*!
 *  \fn function getProductByCategoryWithLocalId($category, $localId)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Fri 05 May 2023 - 10:58:10
 *  \brief get a product from a category with a local id
 *  \param $category    : the category to get the product from
 *  \param $localId     : the local id of the product
 *  \return the product
 *  \remarks --
 */
function getProductByCategoryWithLocalId($idCategory, $localId) {
    global $bdd;

    if ($bdd == NULL)
        throw new Exception("bdd not connected");

    $query = "SELECT * FROM Product WHERE idCategory = '$idCategory' AND localId = '$localId'";
    $result = mysqli_query($bdd, $query);

    if ($result == false)
        return (false);

    $product = mysqli_fetch_assoc($result);

    return ($product);
}

/* -------------------------------------------------------------------------- */

/*!
 *  \fn function getHeaderByCategory($category)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Fri 05 May 2023 - 12:34:06
 *  \brief 
 *  \param 
 *  \return 
 *  \remarks 
 */
function getHeaderByCategoryId($idCategory) {
    global $bdd;

    if ($bdd == NULL)
        throw new Exception("bdd not connected");

    $query = "SELECT * FROM Header WHERE idCategory = $idCategory";
    $result = mysqli_query($bdd, $query);

    if ($result == false)
        throw new Exception("query failed");

    $header = mysqli_fetch_assoc($result);

    return ($header);
}

/* -------------------------------------------------------------------------- */

/*!
 *  \fn function ExistCategory($category)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Fri 05 May 2023 - 12:54:02
 *  \brief 
 *  \param 
 *  \return 
 *  \remarks 
 */
function ExistCategoryName($Category) {
    global $bdd;

    if ($bdd == NULL)
        throw new Exception("bdd not connected");

    $query = "SELECT * FROM Category WHERE name = '$Category'";

    $result = mysqli_query($bdd, $query);

    if ($result == false)
        throw new Exception("query failed");

    $row = mysqli_fetch_assoc($result);

    if ($row == NULL)
        return (false);

    return (true);
}

/* -------------------------------------------------------------------------- */

/*!
 *  \fn function GetUserByLogin($login)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Sun 14 May 2023 - 05:53:00
 *  \brief 
 *  \param 
 *  \return 
 *  \remarks 
 */
function GetUserByLogin($login) {
    global $bdd;

    if( $bdd == NULL)
        throw new Exception("bdd not connected");

    $query = "SELECT * FROM User WHERE login = '$login'";
    $result = mysqli_query($bdd, $query);

    if ($result == false)
        throw new Exception("query failed");

    $users = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }

    return ($users);
}

/* -------------------------------------------------------------------------- */

/*!
 *  \fn function getCartElementById($id)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Sun 14 May 2023 - 05:57:15
 *  \brief 
 *  \param 
 *  \return 
 *  \remarks 
 */
function getCartElementById($id) {
    global $bdd;

    if( $bdd == NULL)
        throw new Exception("bdd not connected");

    $query = "SELECT * FROM Order WHERE id = '$id'";
    $result = mysqli_query($bdd, $query);

    if ($result == false)
        throw new Exception("query failed");

    $row = mysqli_fetch_assoc($result);

    return ($row);
}

/* -------------------------------------------------------------------------- */

/*!
 *  \fn function getIdCategoryByName($nameCategory)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Mon 15 May 2023 - 18:08:10
 *  \brief 
 *  \param 
 *  \return 
 *  \remarks 
 */
function getIdCategoryByName($nameCategory) {
    global $bdd;

    if( $bdd == NULL)
        throw new Exception("bdd not connected");

    $query = "SELECT * FROM Category WHERE name = '$nameCategory'";
    $result = mysqli_query($bdd, $query);

    if ($result == false)
        throw new Exception("query failed");

    $row = mysqli_fetch_assoc($result);

    if ($row == NULL)
        return (false);

    return ($row['id']);
}

?>