<?php
require_once '../TPL/header.php';
?>
        <main class="main">
            <h1 class="loginTitle">
                DÉJA CLIENT? IDENTIFIEZ-VOUS
            </h1>
            <form action="..../Logger-PHP/login" method="POST">
                <input name="mail" class="iEMAIL" placeholder="Adresse e-mail">
                <input name="password" class="iMDP" placeholder="Mot de passe">
                <p class="mdpDesc">Votre mot de passe comprend 8 caractères minimum, avec au moins une lettre majuscule, une lettre miniscule et un chiffre (0-9)</p>
                <a href="#" class="mdpO">Mot de passe oublié?</a>
                <input type="submit" class="button" value="Me Connecter">
            </form>
            <a href="./signIn.php">
            <button class="button">
                Pas de compte ? Inscrivez-vous!
            </button>
            </a>
        </main>
        <script src="../JS/index.js"></script>
    </body>
</html>