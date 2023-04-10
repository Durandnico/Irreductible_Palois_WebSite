<html>
    <head>
        <title>Les irréductibles Palois</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/css/general.css">
        <link rel="stylesheet" href="/css/index.css" >
    </head>
    
    <?php
        include 'html/header.html';
        require_once 'php/varSession.inc.php'
    ?>
    
    <body>
          
            <div class="banner">
                <img src="/img/banner.JPG" alt="banner"> 
            </div>


            <div class="main-presentation">
            <h3 id="main-h3">
                Bienvenue sur le site des irréductibles Palois à CY-Tech Pau.
                <br>
                <br>
                Nous sommes heureux de vous accueillir sur notre site de merch ! Ici vous retrouverez toutes les informations sur la meilleure famille étudiante de CY-Tech et des goodies pour flex sur tout le campus.
            </h3>
            
            <h2 id="main-h2">Visitez notre famille</h2>

            <div class="menu-image">

                <a href="/html/nous.php" >
                    <div class="petite-image-menu" id=i1>
                        <div class="filter-petite-image-menu">
                            <div class="text-petite-image-menu">
                                <h3>
                                    Les légendes
                                </h3>

                                <p>Découvrez les membres de la famille</p>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="/html/boutique.php" >
                    <div class="petite-image-menu" id=i2 style="background-color:rgb(34, 108, 181)">
                        <div class="filter-petite-image-menu">
                            <div class="text-petite-image-menu">
                                <h3>
                                    Les goodies
                                </h3>
                                <p>Devenez le plus P.I.M.P du campus</p>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="/html/galerie.php" >
                    <div class="petite-image-menu" id=i3 style="background-color: yellow;">
                        <div class="filter-petite-image-menu">
                            <div class="text-petite-image-menu">
                                <h3>
                                    Les souvenirs
                                </h3>
                                <p>Revivez les meilleurs moments<br>des irréductibles</p>
                            </div>
                        </div>
                    </div>
                </a>


                <a href="/html/candidature.php" >
                    <div class="petite-image-menu" id=i4 style="background-color: green;">
                        
                        <div class="filter-petite-image-menu">
                            <div class="text-petite-image-menu">
                                <h3>
                                    Soyez grand
                                </h3>
                                <p>Candidature pour être un irréductibles palois</p>
                            </div>
                        </div>
                    </div>
                </a>
                    
            </div>
            
            </div>
        </div>
        
    </body>

    
    <?php
        include 'html/footer.html';
    ?>

</html>
