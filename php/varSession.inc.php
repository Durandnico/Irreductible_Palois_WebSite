<?php
    session_start();

    if(isset($_SESSION['user_data']))
        header('Location: /index.php?error=session_already_initialized');
     
    /* initializing other session var  */
    if (!isset($_SESSION['user_data']))
        $_SESSION['user_data'] = array();

?>
