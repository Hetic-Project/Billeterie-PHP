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
            <label><input type="radio" name="bouton" value="option1">Participant</label>
            <label><input type="radio" name="bouton" value="option2">Organisateur</label>
            <input type="nom" class="iNOM1" placeholder="Username">
            <input type="email" class="iEMAIL1" placeholder="Adresse e-mail">
            <input type="Mot de passe" class="iMDP1" placeholder="Mot de passe">
            <p class="mdpDesc">Votre mot de passe comprend 8 caractères minimum, avec au moins une lettre majuscule, une lettre miniscule et un chiffre (0-9)</p>
            <input type="pays" class="iCountry" placeholder="Pays">
            <input type="pays" class="iCodePostal" placeholder="Code Postal">
            <input type="pays" class="iVille" placeholder="Ville">
            <input type="pays" class="iTel" placeholder="Numéro de téléphone">
            <button>
                Créer mon compte 
            </button>
        </main>
        <script src="../JS/index.js"></script>
    </body>
</html>