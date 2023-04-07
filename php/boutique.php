<?php

    session_start();
    $cat = $_GET['cat'];

    if( !isset($_SESSION['shop_data'][$cat]) ) 
        header('Location: ../index.php?error=1');

    $data = $_SESSION['shop_data'][$cat];
?>


<!-- Path: phtml part -->
<html>
    <head>
        <title>Les irréductibles Palois</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/css/general.css">
        <link rel="stylesheet" href="/css/shop.css">
    </head>
    <div class="header_filter"> </div>
        
        <?php
        require '../inc/header.html';
        ?>


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
                
                <div class="banner_intel">
                    <h1><?php echo $_SESSION['shop_data']['Header'][$cat]['titre'] ?></h1>
                    <p><?php echo $_SESSION['shop_data']['Header'][$cat]['ss-titre'] ?></p>
                    <label style="position: absolute; top:15; right:15;" class="switch">
                        <input onclick="switch_quantity('<?php echo $_SESSION['shop_data']['Header'][$cat]['quantity'] ?>');" type="checkbox" />
                        <span></span>
                    </label>
                    <span style="position: absolute; bottom: 5; right: 12;">Quantité</span>
                </div>
                    
                <div class="vitrine">
                    <table>
                        <tbody>
                            <?php
                                $i=0;
                                foreach ($data as $key => $value) {
                                    if($i % 4 == 0) {echo '<tr>';}
                                    echo '<td>';
                                    echo '  <div class="product">';
                                    echo '      <div class="product-img">';
                                    echo '          <img src="'.$value['image'].'" alt="'.$value['alt'].'" />';
                                    echo '      </div>';
                                    echo '      <div class="content">';
                                    echo '          <h4>'.$value['name'].'</h4>';
                                    echo '          <h5>'.$value['price'].'€</h5>';
                                    echo '          <h3>'.$value['short-description'].'</h3>';
                                    echo '          <span class="'.$_SESSION['shop_data']['Header'][$cat]['quantity'].'" style="visibility:hidden;">Quantité max : '.$value['quantity'].'</span>';
                                    echo '          <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>';
                                    echo '      </div>';
                                    echo '  </div>';
                                    echo '</td>';
                                    if($i % 4 == 3) {echo '</tr>';}
                                    $i++;
                                }
                            ?>
                        </tbody>
                    </table>     
                </div>
            </div>
        </div>
        
<?php
    require '../inc/footer.html';
?>
    </body>


    <!-- JS -->
    <script src="../js/shop.js"></script>
</html>