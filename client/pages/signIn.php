<?php
require_once '../TPL/header.php';
?>
        <main class="main">
            <h1 class="signInTitle">
                CRÉEZ VOTRE COMPTE
            </h1>
            <p class="descForm">
                Veuillez remplir tous les champs :
            </p>
        <form action="..../Logger-PHP/register" method="POST">
            <label><input name="role" type="radio" name="bouton" value="option1" checked>Participant</label>
            <label><input name="role" type="radio" name="bouton" value="option2">Organisateur</label>
            <input name="username" type="nom" class="iNOM1" placeholder="Username">
            <input name="mail" type="email" class="iMDP" placeholder="Adresse e-mail">
            <input name="password" type="Mot de passe" class="iMDP" placeholder="Mot de passe">
            <p class="mdpDesc">Votre mot de passe comprend 8 caractères minimum, avec au moins une lettre majuscule, une lettre miniscule et un chiffre (0-9)</p>
            <input class="iCountry" placeholder="Pays">
            <input class="iCodePostal" placeholder="Code Postal">
            <input class="iVille" placeholder="Ville">
            <input class="iTel" placeholder="Numéro de téléphone">
            <input type="submit" class="button" value="Créer mon compte">
                 
            
        </form>
        </main>
        <script src="../JS/index.js"></script>
    </body>
</html>