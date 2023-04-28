<?php
require_once '../TPL/header.php';
header('Location: http://localhost:3000/index.php');
exit();
?>

        <main class="main">
            <h1 class="loginTitle">
                DÉJA CLIENT? IDENTIFIEZ-VOUS
            </h1>
            <form action="http://localhost:3030/login" class="formLogin" method="POST">
                <input name="username" class="inputText" placeholder="Nom d'utilisateur">
                <input name="password" class="inputText" placeholder="Mot de passe">
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