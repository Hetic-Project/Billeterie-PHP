<?php
require_once '../TPL/header.php';
?>
        <main class="main">
            <h1 class="loginTitle">
                DÉJA CLIENT? IDENTIFIEZ-VOUS
            </h1>
            <form action="" method="POST">
                <input type="email" class="iEMAIL" placeholder="Adresse e-mail">
                <input type="Mot de passe" class="iMDP" placeholder="Mot de passe">
                <p class="mdpDesc">Votre mot de passe comprend 8 caractères minimum, avec au moins une lettre majuscule, une lettre miniscule et un chiffre (0-9)</p>
                <a href="#" class="mdpO">Mot de passe oublié?</a>
                <button>
                    Me Connecter
                </button>
            </form>

            <a href="./signIn.php">
            <input type="button" class="button" value="Pas de compte ? Inscrivez-vous!">
            </a>
        </main>
        <script src="../JS/index.js"></script>
    </body>
</html>