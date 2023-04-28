<?php
require_once '../TPL/header.php';

// Démarrer la session
session_start();

if (isset($_SESSION['username'])) {
    // Si l'utilisateur est connecté
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
        // Si le formulaire de déconnexion a été soumis
        // Détruire la session
        session_destroy();
        // Rediriger l'utilisateur vers la page de connexion
        header('Location: http://localhost:3000/login.php');
        exit;
    }
?>

<?php
} else {
    // Si l'utilisateur n'est pas connecté, il est redirigé vers la page de connexion
    header('Location: http://localhost:3000/login.php');
    exit;
}
?>
<main class="main">
    <h1 class="profileTitle">Mon Profil</h1>
    <p class="subTitleProfile">Informations personnelles</p>
    <div class="bgColor">
        <div id="conteneur1">
            <p id="description">
                Nom : YALMAN
            </p>
            <p id="description">
                Prénom : Lucas
            </p>
            <p id="description">
                Âge : 18 ans
            </p>
        </div>
        <p id="description">
            Localisation : Los Angeles
        </p>
    </div>
    <div>
        <h1 class="profileTitle">Mes billets</h1>
        <p class="billet">Billet No.1</p>
        <div class="bgColor1">
            <p class="eventName">
                Nom de l'évènement :
            </p>
            <p class="eventDate">
                Date :
            </p>
        </div>
        <input type="button" class="button" value="Voir mon billet">

        <form method="post">
            <input type="submit" class="button" name="logout" value="Me déconnecter">
        </form>
    </div>
</main>
<script src="../JS/index.js"></script>
</body>
</html>
