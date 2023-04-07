<?php
    session_start();
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
            
                <div class="banner_intel">
                    <h1>Les goodies</h1>
                    <p>Soyez-unique avec vos goodies des irréductible</p>
                    <label style="position: absolute; top:15; right:15;" class="switch">
                        <input onclick="switch_quantity('q_max_goodies');" type="checkbox" />
                        <span></span>
                    </label>
                    <span style="position: absolute; bottom: 5; right: 12;">Quantité</span>
                </div>

                <div class="vitrine">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="product" >
                                        <div class="product-img">
                                            <img id=i1 src="../img/casquePolonais.png" alt="maillot" />
                                        </div>

                                        <div class="content">
                                            <h4>Casque polonais (légérement abimé)</h4>
                                            <h5>Utile pour initiation de famille</h5>
                                            <h3>69€</h3>
                                            <span class="q_max_goodies" style="visibility:hidden;">quantité max : <span id="q_max">1</span></span>
                                            <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="product" >
                                        <div class="product-img">
                                            <img src="../img/logo.png" alt="maillot" />
                                        </div>

                                        <div class="content">
                                            <h4>Table de beerpong ! (sans tréteau)</h4>
                                            <h5>Légendaire table de IR</h5>
                                            <h3>420€</h3>
                                            <span class="q_max_goodies" style="visibility:hidden;">quantité max : <span>1</span></span>
                                            <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>
                                        </div>
                                    </div>
                                </td>
                            
                                <td>
                                    <div class="product" >
                                        <div class="product-img">
                                            <img src="../img/NFC2.jpg" alt="maillot" />
                                        </div>

                                        <div class="content">
                                            <h4>NFT du logo irréductible</h4>
                                            <h5>Le seul NFT des IR</h5>
                                            <h3>1138€</h3>
                                            <span class="q_max_goodies" style="visibility:hidden;">quantité max : <span>1</span></span>
                                            <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="product" >
                                        <div class="product-img">
                                            <img src="../img/Litron.webp" id="contain" alt="Litron" />
                                        </div>

                                        <div class="content">
                                            <h4>Litron du VB</h4>
                                            <h5>La seule vrai taille de bière</h5>
                                            <h3>21,89€</h3>
                                            <span class="q_max_goodies" style="visibility:hidden;">quantité max : <span>15</span></span>
                                            <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="product" >
                                        <div class="product-img">
                                            <img src="../img/cigare.jpg" alt="cigare" />
                                        </div>

                                        <div class="content">
                                            <h4>Cigare</h4>
                                            <h5>Cigare préferé de Nico</h5>
                                            <h3>12€</h3>
                                            <span class="q_max_goodies" style="visibility:hidden;">quantité max : <span>500</span></span>
                                            <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="product" >
                                        <div class="product-img">
                                            <img src="../img/bob.png" alt="Bob" />
                                        </div>

                                        <div class="content">
                                            <h4>Bob Cochonou</h4>
                                            <h5>L'apogée du style</h5>
                                            <h3>19,99€</h3>
                                            <span class="q_max_goodies" style="visibility:hidden;">quantité max : <span>12</span></span>
                                            <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="banner_intel">
                    <h1>Alcool</h1>
                    <p>Pour ne pas venir aux soirées les mains vides ;)</p>
                    <label style="position: absolute; top:15; right:15;" class="switch">
                        <input onclick="switch_quantity('q_max_OH');" type="checkbox" />
                        <span></span>
                    </label>
                    <span style="position: absolute; bottom: 5; right: 12;">Quantité</span>
                </div>

                <table class="vitrine">
                    <tbody>
                        <tr>
                            <td>
                                <div class="product" >
                                    <div class="product-img">
                                        <img src="../img/captain.png" id="contain" alt="Captain-Morgan" />
                                    </div>

                                    <div class="content">
                                        <h4>Captain Morgan</h4>
                                        <h5>Le rhum préférez de CY-Tech</h5>
                                        <h3>17€</h3>
                                        <span class="q_max_OH" style="visibility:hidden;">quantité max : <span>150</span></span>
                                        <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="product" >
                                    <div class="product-img">
                                        <img src="../img/Poliakov.png" id="contain" alt="Pauliakov" />
                                    </div>

                                    <div class="content">
                                        <h4>Poliakov</h4>
                                        <h5>Simple et classique pour t'exploser le crane</h5>
                                        <h3>14€</h3>
                                        <span class="q_max_OH" style="visibility:hidden;">quantité max : <span>200</span></span>
                                        <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>
                                    </div>
                                </div>
                            </td>
                        
                            <td>
                                <div class="product" >
                                    <div class="product-img">
                                        <img src="../img/ballantines.webp" id="contain" alt="Ballantine" />
                                    </div>

                                    <div class="content">
                                        <h4>Ballantine's</h4>
                                        <h5>Pour les parties de poker !</h5>
                                        <h3>19€</h3>
                                        <span class="q_max_OH" style="visibility:hidden;">quantité max : <span>30</span></span>
                                        <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="product" >
                                    <div class="product-img">
                                        <img src="../img/ricard.webp" id="contain" alt="Ricard" />
                                    </div>

                                    <div class="content">
                                        <h4>Ricard</h4>
                                        <h5>Midi et quart, heure du ricard</h5>
                                        <h3>15€</h3>
                                        <span class="q_max_OH" style="visibility:hidden;">quantité max : <span>65</span></span>
                                        <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="product" >
                                    <div class="product-img">
                                        <img src="../img/jager.webp" id="contain" alt="Jager" />
                                    </div>

                                    <div class="content">
                                        <h4>Jäger</h4>
                                        <h5>A base de plante, comme les joins</h5>
                                        <h3>22€</h3>
                                        <span class="q_max_OH" style="visibility:hidden;">quantité max : <span>300</span></span>
                                        <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="product" >
                                    <div class="product-img">
                                        <img src="../img/Baileys.png" id="contain" alt="Baileys" />
                                    </div>

                                    <div class="content">
                                        <h4>Baileys</h4>
                                        <h5>Pour remplacer le café</h5>
                                        <h3>12€</h3>
                                        <span class="q_max_OH" style="visibility:hidden;">quantité max : <span>15</span></span>
                                        <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="product" >
                                    <div class="product-img">
                                        <img src="../img/Maydie.png" id="contain" alt="Maydie" />
                                    </div>

                                    <div class="content">
                                        <h4>Maydie</h4>
                                        <h5>Vin rouge sucré Béarnais</h5>
                                        <h3>15€</h3>
                                        <span class="q_max_OH" style="visibility:hidden;">quantité max : <span>5</span></span>
                                        <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="banner_intel">
                    <h1>Random stuff</h1>
                    <p>(Image non contractuelle)</p>
                    <p>PS : c'est les copains et ils sont d'accord</p>
                    <label style="position: absolute; top:15; right:15;" class="switch">
                        <input onclick="switch_quantity('q_max_autre');" type="checkbox" />
                        <span></span>
                    </label>
                    <span style="position: absolute; bottom: 5; right: 12;">Quantité</span>
                </div>

                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div class="product" >
                                    <div class="product-img">
                                        <img src="../img/Ugo.jpg" id="fit" alt="NH90" />
                                    </div>

                                    <div class="content">
                                        <h4>NH90 Bi-turbines</h4>
                                        <h5>Meilleur des hélicoptères</h5>
                                        <h3>69 420€</h3>
                                        <span class="q_max_autre" style="visibility:hidden;">quantité max : <span>5</span></span>
                                        <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="product" >
                                    <div class="product-img">
                                        <img src="../img/Leop.jpg" id="fit" alt="Dofus" />
                                    </div>

                                    <div class="content">
                                        <h4>Mois d'abonnement Dofus</h4>
                                        <h5>Pour le meilleur gaming possible</h5>
                                        <h3>5€</h3>
                                        <span class="q_max_autre" style="visibility:hidden;">quantité max : <span>999</span></span>
                                        <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="product" >
                                    <div class="product-img">
                                        <img src="../img/Remi.jpg" id="fit" alt="Smarties" />
                                    </div>

                                    <div class="content">
                                        <h4>Distributeur de Smarties</h4>
                                        <h5>Au cas ou il y a une petite faim</h5>
                                        <h3>0,50€</h3>
                                        <span class="q_max_autre" style="visibility:hidden;">quantité max : <span>1</span></span>
                                        <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="product" >
                                    <div class="product-img">
                                        <img src="../img/Jesus.jpg" id="fit" alt="JeuPourEnfant" />
                                    </div>

                                    <div class="content">
                                        <h4>Jouet pour enfant</h4>
                                        <h5>Un anniversaire réussi</h5>
                                        <h3>50€</h3>
                                        <span class="q_max_autre" style="visibility:hidden;">quantité max : <span>50</span></span>
                                        <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="product" >
                                    <div class="product-img">
                                        <img src="../img/Ransan.jpg" id="fit" alt="CG" />
                                    </div>

                                    <div class="content">
                                        <h4>Carte graphique</h4>
                                        <h5>Bat Nvidia et AMD</h5>
                                        <h3>1 000 000€</h3>
                                        <span class="q_max_autre" style="visibility:hidden;">quantité max : <span>5</span></span>
                                        <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="product" >
                                    <div class="product-img">
                                        <img src="../img/Naiwann.jpg" id="fit" alt="GrillePain" />
                                    </div>

                                    <div class="content">
                                        <h4>Grille Pain</h4>
                                        <h5>Il t'enfourne comme personne</h5>
                                        <h3>3773€</h3>
                                        <span class="q_max_autre" style="visibility:hidden;">quantité max : <span>9</span></span>
                                        <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="product" >
                                    <div class="product-img">
                                        <img src="../img/Mael.jpg" id="fit" alt="Couteau"/>
                                    </div>

                                    <div class="content">
                                        <h4>Couteau de Cuisine</h4>
                                        <h5>Cut cut</h5>
                                        <h3>4€</h3>
                                        <span class="q_max_autre" style="visibility:hidden;">quantité max : <span>61</span></span>
                                        <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="product" >
                                    <div class="product-img">
                                        <img src="../img/Goat.jpg" id="fit" alt="Balais" />
                                    </div>

                                    <div class="content">
                                        <h4>Balais à chiotte</h4>
                                        <h5>Spouik Spouik</h5>
                                        <h3>6,90€</h3>
                                        <span class="q_max_autre" style="visibility:hidden;">quantité max : <span>7</span></span>
                                        <button onclick="zoom_product(this)"><div class="my_filter"><p>Ajouter au panier</p></div></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <?php
                include_once 'inc/footer.html';
            ?>
        </div>
    </body>

    <!-- JS -->
    <script src="../js/shop.js"></script>
</html>
