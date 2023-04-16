<header>

    <div class="main_logo">
        <img src="/img/logo.png" onclick="location.href='/index.php';" alt="logo" />
    </div>

    <ul class="menu">
        <li><a href="/html/nous.php">Nous</a></li>
        <li>
            <div class="dropdown">
                <a class="dropbtn" href="/html/boutique.php">Boutique</a>
                <div class="dropdown-content">
                    <a id=item href="/html/boutique.php?cat=goodies">Goodies</a>
                    <a id=item href="/html/boutique.php?cat=alcool">Alcool</a>
                    <a id=item href="/html/boutique.php?cat=Random">Autre</a>
                </div>
            </div> 
        </li>
        <li><a href="/html/galerie.php">Galerie</a></li>
        <li><a href="/html/candidature.php">Candidature</a></li>
        <li><a href="/html/contact.php">Contact</a></li>
    </ul>

    <ul class="menu-sign">
        <?php

        if( !isset($_SESSION['user_data']['surname']) ) 
            echo '<li><a href="/html/connexion.php">Connexion</a></li>';
        
        else {
            echo '<li>
                <div class="dropdown">
                    <a class="dropbtn" > Panier</a>
                    <div class="dropdown-content" id="cart">
                        <p id=item class="empty_cart">Le panier est vide</p>
                    </div>
                </div> 
            </li>';
            echo '<li>
                <div class="dropdown">
                    <a class="dropbtn">' . $_SESSION['user_data']['surname'] . '</a>
                    <div class="dropdown-content">
                        <a id=item href="/php/end_session.php">Deconnexion</a>
                    </div>
                </div> 
            </li>';
        }
        ?>
    </ul>
</header>
<div class="my_padding_top"></div>

