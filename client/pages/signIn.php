<?php
require_once '../TPL/header.php';
if(isset($_SESSION['username'])) {
    header('Location: http://localhost:3000/index.php');
    exit();
?>
        <main class="main">
            <h1 class="signInTitle">CRÉEZ VOTRE COMPTE</h1>
            <p class="descForm">
                Veuillez remplir tous les champs :
            </p>
            <form action="http://localhost:3030/register" method="POST">
                <label class="role"><input name="role" type="radio" name="bouton" value="participant" checked>Participant</label>
                <label class="role"><input name="role" type="radio" name="bouton" value="organisateur">Organisateur</label>
                <input name="username" type="nom" class="inputText" placeholder="Username">
                <input name="mail" type="email" class="inputText" placeholder="Adresse e-mail">
                <input name="password" type="Mot de passe" class="inputText" placeholder="Mot de passe">
                <input type="submit" class="button" value="Créer mon compte">
            </form>
        </main>
        <script src="../JS/index.js"></script>
    </body>
</html>