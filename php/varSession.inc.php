<?php
    session_start();

    /* initializing shop data from json file */
    if (!isset($_SESSION['shop_data'])) {
        $json = file_get_contents('data/shop.json');
        $data = json_decode($json, true);
        $_SESSION['shop_data'] = $data;
        
    }
     
    /* initializing other session var  */
    if (!isset($_SESSION['user_data']))
        $_SESSION['user_data'] = array();

?>
