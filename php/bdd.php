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
 *  \return true if the connexion is open, throw Exception otherwise (return the error if the connexion failed)
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
 *  \return true if the connexion is closed, throw Exception otherwise (if the connexion is not open)
 *  \remarks need to call Connexion() before
 */
function Deconnexion() {
    global $bdd;

    if ($bdd == NULL)
        throw new mysqli_sql_exception("bdd not connected"); 
        //throw new Exception("bdd not connected", 1, NULL);

    mysqli_close($bdd);

    return (true);
}

/* -------------------------------------------------------------------------- */

/*!
 *  \fn function isBddConnected()
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Mon 15 May 2023 - 22:25:03
 *  \brief 
 *  \param 
 *  \return 
 *  \remarks 
 */
function isBddConnected() {
    global $bdd;

    return ($bdd != NULL);
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
        throw new Exception("query failed");

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
 *  \return true if the stock is lowered, throw Exception otherwise
 *  \remarks --
 */
function lowerStock($id, $quantity) {
    global $bdd;

    if ($bdd == NULL)
        throw new Exception("bdd not connected");

    /* check if the stock is enough */
    $product = getProductById($id);
    if ($product['quantity'] < $quantity)
        throw new Exception("Not enough stock (". $product['quantity'] ."/". $quantity ." )");

    $query = "UPDATE Product SET quantity = quantity - '$quantity' WHERE id = '$id'";
    $result = mysqli_query($bdd, $query);

    if ($result == false)
        throw new Exception("query failed");

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
        throw new Exception("query failed");
        
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
    throw new Exception("query failed");

    $product = mysqli_fetch_assoc($result);

    return ($product);
}

/* -------------------------------------------------------------------------- */

/*!
 *  \fn function getHeaderByCategory($idCategory)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Fri 05 May 2023 - 12:34:06
 *  \brief get the header of a category
 *  \param $idCategory  : the id of the category
 *  \return the header
 *  \remarks --
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
 *  \fn function ExistCategory($categoryName)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Fri 05 May 2023 - 12:54:02
 *  \brief check if a category exist
 *  \param $categoryName : the name of the category
 *  \return true if the category exist, throw Exception otherwise
 *  \remarks --
 */
function ExistCategoryName($categoryName) {
    global $bdd;

    if ($bdd == NULL)
        throw new Exception("bdd not connected");

    $query = "SELECT * FROM Category WHERE name = '$categoryName'";

    $result = mysqli_query($bdd, $query);

    if ($result == false)
        throw new Exception("query failed");

    $row = mysqli_fetch_assoc($result);

    return (true);
}

/* -------------------------------------------------------------------------- */

/*!
 *  \fn function GetUserByLogin($login)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Sun 14 May 2023 - 05:53:00
 *  \brief get a user from its login
 *  \param $login   : the login of the user
 *  \return the user
 *  \remarks --
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
 *  \fn function getAllUsers()
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Mon 15 May 2023 - 22:11:27
 *  \brief get all the users
 *  \return all the users
 *  \remarks --
 */
function getAllUsers() {
    global $bdd;

    if( $bdd == NULL)
        throw new Exception("bdd not connected");

    $query = "SELECT * FROM User";
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
 *  \fn function loginUserById($idUser)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Mon 15 May 2023 - 22:12:31
 *  \brief 
 *  \param 
 *  \return 
 *  \remarks 
 */
function loginUserById ($idUser) {
    global $bdd;

    if( $bdd == NULL)
        throw new Exception("bdd not connected");

    $query = "UPDATE User SET connected = TRUE WHERE id = '$idUser'";
    $result = mysqli_query($bdd, $query);

    if ($result == false)
        throw new Exception("query failed");

    return (true);
}

/* -------------------------------------------------------------------------- */

/*!
 *  \fn function logoutUserById($idUser)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Mon 15 May 2023 - 22:15:27
 *  \brief 
 *  \param 
 *  \return 
 *  \remarks 
 */
function logoutUserById ($idUser) {
    global $bdd;

    if( $bdd == NULL)
        throw new Exception("bdd not connected");

    $query = "UPDATE User SET connected = false WHERE id = '$idUser'";
    $result = mysqli_query($bdd, $query);

    if ($result == false)
        throw new Exception("query failed");

    return (true);
}

/* -------------------------------------------------------------------------- */

/*!
 *  \fn function insertUser($login, $surname, $password, $connected)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Mon 15 May 2023 - 22:43:32
 *  \brief 
 *  \param 
 *  \return 
 *  \remarks 
 */
function insertUser($login, $surname, $password, $connected) {
    global $bdd;

    if( $bdd == NULL)
        throw new Exception("bdd not connected");

    $query = "INSERT INTO User VALUES (null, '$login', '$surname', '$password', '$connected')";
    $result = mysqli_query($bdd, $query);

    if ($result == false)
        throw new Exception("query failed");

    return (GetUserByLogin($login));
}

/* -------------------------------------------------------------------------- */

/*!
 *  \fn function getCartElementById($id)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Sun 14 May 2023 - 05:57:15
 *  \brief get a cart element from its id
 *  \param $id  : the id of the cart element
 *  \return the cart element
 *  \remarks --
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
 *  \brief get the id of a category from its name
 *  \param $nameCategory    : the name of the category
 *  \return the id of the category
 *  \remarks --
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

    return ($row['id']);
}

/* -------------------------------------------------------------------------- */

/*!
 *  \fn function incCartStock($idUser, $idProduct, $quantity)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Tue 16 May 2023 - 13:21:37
 *  \brief increment the stock of a product in the cart of a user by a quantity
 *  \param $idUser      : the id of the user
 *  \param $idProduct   : the id of the product
 *  \param $quantity    : the quantity to increment
 *  \return 
 *  \remarks -- 
 */
function incCartStock($idUser, $idProduct, $quantity) {
    global $bdd;

    if ($bdd == NULL)
        throw new Exception("bdd not connected");

    /* check if the stock is enough */
    $product = getProductById($idProduct);

    if ($product['quantity'] < $quantity)
        throw new Exception("Not enough stock");

    $query = "UPDATE Cart SET quantity = quantity + '$quantity' WHERE idProduct = '$idProduct' AND idUser = '$idUser'";
    $result = mysqli_query($bdd, $query);

    if ($result == false)
        throw new Exception("query failed");

    return (true);
}

/* -------------------------------------------------------------------------- */

/*!
 *  \fn function addCart($idUser, $idProduct, $quantity)
 *  \author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  \version 0.1
 *  \date Tue 16 May 2023 - 13:28:55
 *  \brief 
 *  \param 
 *  \return 
 *  \remarks 
 */
function addCart($idUser, $idProduct, $quantity) {
    global $bdd;

    if ($bdd == NULL)
        throw new Exception("bdd not connected");

    
    $query = "INSERT INTO Cart VALUES (null, '$idUser', '$idProduct', '$quantity')";
    $result = mysqli_query($bdd, $query);

    if ($result == false)
        throw new Exception("query failed");

    return (true);
}

/* -------------------------------------------------------------------------- */

/**
 *  @fn function is_admin($idUser)
 *  @author DURAND Nicolas Erich Pierre <durandnico@cy-tech.fr>
 *  @version 0.1
 *  @date Tue 16 May 2023 - 16:59:35
 *  @brief 
 *  @param 
 *  @return 
 *  @remarks 
 */
function is_admin($idUser) {
    global $bdd;

    if ($bdd == NULL)
        throw new Exception("bdd not connected");

    $query = "SELECT * FROM Admin WHERE idUser = '$idUser'";
    $result = mysqli_query($bdd, $query);

    if ($result == false)
        throw new Exception("query failed");

    $row = mysqli_fetch_assoc($result);

    if ($row != null)
        return (true);
    else
        return (false);
}
?>