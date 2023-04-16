<?php
    session_start();

    //define(FILE_XML, "../data/user.xml");
    
    $file = "../data/user.xml";

    /* set user to offline */
    $xml = simplexml_load_file($file);
    
    /* if the file is not found */
    if(!$xml)
        echo 'error';

    $xml->user[(int) $_SESSION['user_data']['id']]->connected = "false";
    $xml->asXML($file);

    unset($xml);
    
    session_destroy();

    Header("Location: /index.php");
?>