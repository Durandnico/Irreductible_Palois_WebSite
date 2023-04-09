<?php
    session_start();
    $cat = $_GET['cat'];

    if(isset($_GET['cat']) &&  !isset($_SESSION['shop_data']['shop'][$cat]) ) 
        header('Location: ../index.php?error=1');

?>

<html>
    <head>
        <title>Les irréductibles Palois</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/css/general.css">
        <link rel="stylesheet" href="/css/shop.css">
    </head>
    
    <?php
        include '../inc/header.html';
    ?>

    <div class="header_filter">

    </div>

</div>
    <body>
        <div class="Zoomed-product" hidden onblur="close_zoomed_product(this)">
            <div class="product-content">
                <div id="img-background" class="product-content-image"></div>
                <div class="product-content-info">
                    <div id="intels" class="text">
                        <h1>Casque polonais (légérement abimé)</h1>
                        <h3>Utile pour initiation de famille!</h3>
                        <!--<h4>conseil d'utilisation: préparer 5 shooters sur une table, munissez-vous d'objets insolites (pied de table, panneau de circulation, gant de boxe) et surtout n'oubliez pas d'immortaliser le moment</h4> -->
                        <h4>More description to add</h4>
                        <h2>69€</h2>
                    </div>

                    <div class="quantite">
                        <fieldset class="quantity">
                            <legend>Quantité</legend>
                            <input id="qte" type="number" class="number" value=1 />
                            <div class="btnplusmoins"> 
                                <button class="plus" onclick="plusmoins(+1)"><div class="my_filter">+</div></button>
                                <button class="minus" onclick="plusmoins(-1)"><div class="my_filter">-</div></button>
                            </div>
                        </fieldset>
                        <span> quantité max : <span id="q_max"></span></span>
                    </div>
                    <button><div class="my_filter"><p>Acheter</p></div></button>
                </div>    
            </div>
            <button id="quit" onclick="close_zoomed_product()">X</button>
        </div>

        <div class="big_filter">




            <div class="main-presentation">
            
                <?php
                    if(!isset($_GET['cat']))
                        foreach( $_SESSION['shop_data']['shop'] as $key => $value) 
                        {
                            $MY_GET = $key;
                            include '../php/boutique.php';

                        }
                    else
                        include_once '../php/boutique.php';
                ?> 
            
            </div>
            
            

            <?php
                include_once 'inc/footer.html';
            ?>
        </div>
    </body>

    <!-- JS -->
    <script src="../js/shop.js"></script>
</html>
