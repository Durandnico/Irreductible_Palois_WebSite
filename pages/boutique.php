<?php
    session_start();
    
    require_once '../php/bdd.php';
    if ( !isBddConnected() )
        try {
            Connexion();
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    if(!isset($_SESSION['user_data']['id']))
        header('Location: connexion.php?error=must_be_connected');

    if(isset($_GET['cat']))
        $cat = $_GET['cat'];
    
    
    if(isset($_GET['cat']) &&  ! ExistCategoryName($cat) ) 
        header('Location: ../index.php?error=category_not_exist');

    $idCat = getIdCategoryByName($cat);
?>

<html>
    <head>
        <title>Les irréductibles Palois</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/css/general.css">
        <link rel="stylesheet" href="/css/shop.css">
    </head>
    
    <?php
        require 'header.php';
    ?>

    <div class="header_filter">

    </div>
</div>
    <body>
        <div class="Zoomed-product" hidden onblur="close_zoomed_product(this)">
            <div class="product-content">
                <div id="img-background" class="product-content-image">
                    <img id="img-zoomed" src="/img/produits/1.jpg" alt="image zoomed" style="display: none;"/>
                </div>
                <div class="product-content-info">
                    <div id="intels" class="text">
                        <h1>Casque polonais (légérement abimé)</h1>
                        <h3>Utile pour initiation de famille!</h3>
                        <!--<h4>conseil d'utilisation: préparer 5 shooters sur une table, munissez-vous d'objets insolites (pied de table, panneau de circulation, gant de boxe) et surtout n'oubliez pas d'immortaliser le moment</h4> -->
                        <h4>More description to add</h4>
                        <h2 id=price>69€</h2>
                        <input type="number" style="display: none;" id=id_fullProduct >
                    </div>

                    <div class="quantite">
                        <fieldset class="quantity">
                            <legend>Quantité</legend>
                            <input id="qte" type="number" class="number" value=0 />
                            <div class="btnplusmoins"> 
                                <button class="plus" onclick="plusmoins(+1)"><div class="my_filter">+</div></button>
                                <button class="minus" onclick="plusmoins(-1)"><div class="my_filter">-</div></button>
                            </div>
                        </fieldset>
                        <span> quantité max : <span id="q_max"></span></span>
                    </div>
                    <button onclick="add_to_cart(this);"><div class="my_filter"><p>Acheter</p></div></button>
                </div>    
            </div>
            <button id="quit" onclick="close_zoomed_product()">X</button>
        </div>

        <div class="big_filter">




            <div class="main-presentation">
            
                <?php
                    if(!isset($_GET['cat']))
                        foreach( getCategories() as $category) 
                        {
                            $idCat = $category['id'];
                            $cat = $category['name'];
                            require '../php/boutique.php';
                        }
                    else
                        require_once '../php/boutique.php';
                ?> 
            
            </div>
            
            

            <?php
                require_once 'footer.htm';
            ?>
        </div>
    </body>

    <!-- JS -->
    <script src="/js/shop.js"></script>
<html>
