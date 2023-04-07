<?php
    session_start();
    echo "start";
    /* initialisation de la variable de session from json file */
    if (!isset($_SESSION['shop_data'])) {
        $json = file_get_contents('data/json/shop.json');
        $data = json_decode($json, true);
        $_SESSION['shop_data'] = $data;
        echo "done";
    }
     
?>
