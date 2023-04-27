<?php
require_once '../TPL/header.php';
?>
        <main class="main">
            <h1 class="signInTitle">CRÉEZ VOTRE COMPTE</h1>
            <p class="descForm">
                Veuillez remplir tous les champs :
            </p>
            <form action="..../Logger-PHP/register" method="POST">
                <label class="role"><input name="role" type="radio" name="bouton" value="option1" checked>Participant</label>
                <label class="role"><input name="role" type="radio" name="bouton" value="option2">Organisateur</label>
                <input name="username" type="nom" class="inputText" placeholder="Username">
                <input name="mail" type="email" class="inputText" placeholder="Adresse e-mail">
                <input name="password" type="Mot de passe" class="inputText" placeholder="Mot de passe">
                <p class="mdpDesc">Votre mot de passe comprend 8 caractères minimum, avec au moins une lettre majuscule, une lettre miniscule et un chiffre (0-9)</p>
                <input type="submit" class="button" value="Créer mon compte">
            </form>
        </main>
        <script src="../JS/index.js"></script>
    </body>
</html>