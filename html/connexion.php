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
</head>

<?php
include 'header.htm';
?>

<body>
    <div class="login-page">
        <div class="form">
            <img src="/img/NFC.jpg" alt="Naiwann">
            <form class="register-form" method="$_POST">
                <input type="text" placeholder="name" />
                <input type="password" placeholder="password" />
                <input type="text" placeholder="email address" />
                <button>create</button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form class="login-form" method="$_POST">
                <input type="text" placeholder="username" />
                <input type="password" placeholder="password" />
                <button>login</button>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
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
include 'footer.htm';
?>

<html>