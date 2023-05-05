<?php
session_start();
?>

<html>

<head>
    <title>Les irréductibles Palois</title>
    <meta charset="utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/connexion.css">
    <script src="/js/verif.js"></script>
</head>

<?php
require 'header.php';
?>

<body>
    <div class="login-page">
        <div class="form">
            <img src="/img/NFC.jpg" alt="Naiwann">
	    <p name="error_message" style="color: red; margin-bottom: 10px;"><?php if(isset($_GET['error'])) echo $_GET['error']; ?></p>
	    <form class="register-form" method="POST" action="/php/addInscription.php" onsubmit="return form_verif_signUp();">
                <input id=username name="username" type="text" placeholder="pseudonyme" />
                <input id=surname name="surname" type="text" placeholder="sur-nom" />
                <input id=password name="password" type="password" placeholder="Mot de passe" />
                <input type="submit" value="créer"/>
                <p class="message">Déjà inscrit? <a href="#">Connectez-vous</a></p>
            </form>
            <form class="login-form" method="POST" action="/php/verifConnexion.php">
                <input type="text" name=username placeholder="pseudonyme" />
                <input type="password" name=password placeholder="Mot de passe" />
                <input type="submit" value="login" />
                <p class="message">Pas encore inscrit? <a href="#">Créer votre compte</a></p>
            </form>
        </div>
    </div>
</body>


<script>
    $('.message a').click(function() {
        $('form').animate({
            height: "toggle",
            opacity: "toggle"
        }, "slow");
    });
</script>

<!-- Thanks to Aigars Silkalns for the login form opensource -->

<?php
require 'footer.htm';
?>

<html>
