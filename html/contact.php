<?php
    session_start();
?>

<html>
    <head>
        <title>Les irréductibles Palois</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/general.css">
        <link rel="stylesheet" href="../css/contact.css">
    </head>

    <?php
        require 'header.php';
    ?>

    <body id=<?php if(isset($_GET['prenom'])) echo "verif"; else echo "clean"; ?>>
        

        <div class="main-presentation">
            <div class="contact_us">
                <div class="banner_intel">
                    <h1>Contactez-nous</h1>
                    <p>Vous avez une question ? Vous souhaitez nous faire part d'un problème ? N'hésitez pas à nous contacter !</p>
                </div>

                <form id="form-id" action="/php/verifForm.php" method="POST" onsubmit="return true//form_verif()">
                    
                    <div class="personnal-intel">
                        
                        <div class="fullname">
                            <div class="prenom">
                                <div class="input-field">
                                    <label for="prenom"><span class="label-style">Prénom</span></label>
                                    <input  type="text" id="prenom" name="prenom" placeholder="Votre prénom.." value="<?php if(isset($_GET['prenom'])) echo $_GET['prenom'];?>"  onfocusout="verif_prenom_nom(this)">
                                    <div class="verif">⚠ <span id="verif_prenom">Message d'error prenom</span></div>
                                </div>
                            </div>
                            
                            <div class="nom">
                                <div class="input-field">
                                    <label for="nom"><span class="label-style">Nom</span></label>
                                    <input  type="text" id="nom" name="nom" placeholder="Votre nom.." value="<?php if(isset($_GET['nom'])) echo $_GET['nom'];?>" onfocusout="verif_prenom_nom(this)">
                                    <div class="verif" id="verif_nom">⚠ <span id="verif_nom">Message d'error nom</span></div>
                                </div>
                            </div>
                        </div>
                          
                        <div class="mail">
                            <div class="input-field">
                                <label for="email"><span class="label-style">Email</span></label>
                                <input  type="text" id="email" name="email" placeholder="Votre email.." value="<?php if(isset($_GET['email'])) echo $_GET['email'];?>" onfocusout   ="verif_mail(this)">
                                <div class="verif">⚠ <span id="verif_email">Message d'error mel</span></div>
                            </div>
                        </div>
                        
                        <div class="more-intel">
                            <div class="left-intel">

                                <fieldset class="genre">
                                    <legend>Genre</legend>
                                    
                                    <div class="radio-btn">
                                        <label for="Homme">Homme</label>
                                        <input  type="radio" name="genre" id="Homme" onclick="hide_error(this)">
                                    </div>

                                    <div class="radio-btn">
                                        <label for="Femme">Femme</label>
                                        <input  type="radio" name="genre" id="Femme" onclick="hide_error(this)">
                                    </div>

                                    <div class="radio-btn">
                                        <label for="Dragon">MétéoRémite</label>
                                        <input  type="radio" name="genre" id="Dragon" onclick="hide_error(this)">
                                    </div>
                                    
                                </fieldset>
                                <div class="verif">⚠ <span id="verif_genre">Merci de selectionner un genre</span></div>    
                            </div>
                        
                            <div class="right-intel">
                                <div class="job">
                                    <div class="input-field">
                                        <label for="job"><span class="label-style">Metier</span></label>
                                        <select id="job" name="job"  value="<?php if(isset($_GET['job'])) echo $_GET['job'];?>" onfocusout="verif_select(this)">
                                            <option value="choix">--Votre choix</option>
                                            <option value="etudiant">Etudiant</option>
                                            <option value="professeur">Professeur</option>
                                            <option value="autre">Autre</option>
                                        </select>
                                        <div class="verif">⚠ <span id="verif_job">Message d'erreur, selectionner</span></div>
                                    </div>
                                </div>
                                
                                <div class="bday">
                                    <div class="input-field">
                                        <label for="birthday"><span class="label-style">Date de naissance</span></label>
                                        <input  id="bday" min="2002-09-03" type="date" id="birthday" name="birthday" value="<?php if(isset($_GET['birthday'])) echo $_GET['birthday'];?>" onfocusout="verif_date(this)">
                                        <div class="verif">⚠ <span id="verif_bday">Message d'erreur bday!</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="message">

                        <div class="subject">
                            <div class="input-field">
                                <label for="subject"><span class="label-style">Sujet</span></label>
                                <input  type="text" id="subject" name="subject" placeholder="Sujet..." value="<?php if(isset($_GET['subject'])) echo $_GET['subject'];?>" onfocusout="verif_not_empty(this)">
                                <div class="verif">⚠ <span id="verif_subject">Message d'erreur car oublie</span></div>
                            </div>
                        </div>

                        <div class="text-message">
                            <div class="input-field">
                                <label for="message"><span class="label-style">Message</span></label>
                                <textarea id="message" name="message" placeholder="Votre message.." style="height:200px; resize: none;" value="<?php if(isset($_GET['message'])) echo $_GET['message'];?>" onfocusout="verif_not_empty(this)"></textarea>
                                <div class="verif">⚠ <span id="verif_message">Message d'erreur bouboubou</span></div>
                            </div>

                            <div class="envoyer">
                                <div class="input-field">
                                    <input type="submit" value="Envoyer">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </form>

            </div>
        </div>

    </body>

    <?php
        include 'footer.htm';
    ?>

    <script src="../js/verif.js"></script>
<html>