<?php
require_once '../TPL/header.php';

session_start();

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['username'])) {
    // L'utilisateur est connecté
    echo "L'utilisateur est connecté.";
} else {
    // L'utilisateur n'est pas connecté
    echo $_SESSION['username'];

}
?>
        <main class="main">
            <h1 class="profileTitle">Mon Profil</h1>
            <p class="subTitleProfile">Informations personnelles</p>
            <div class="bgColor">
                <div id="conteneur1">
                    <p id="description">
                        Nom : <?= $_SESSION['username'] ?>
                    </p>
                    <p id="description">
                        mail : <?= $_SESSION['mail'] ?>
                    </p>
                    <p id="description">
                        Rôle : <?= $_SESSION['role'] ?>
                    </p>
                </div>
                <p id="description">
                    id : <?= $_SESSION['id'] ?>
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

                <form action="..../Logger-PHP/logout" method="GET">
                    <input type="button" class="button" value="Me déconnecter">
                </form>
            </div>
        </main>
        <script src="../JS/index.js"></script>
    </body>
</html>