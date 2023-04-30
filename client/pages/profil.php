<?php
require_once '../TPL/header.php';

// Démarrer la session
session_start();

if (isset($_SESSION['token'])) {
    // Si l'utilisateur est connecté
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
        // Si le formulaire de déconnexion a été soumis
        // Détruire la session
        session_destroy();
        // Rediriger l'utilisateur vers la page de connexion
        header('Location: http://localhost:3000/pages/login.php');
        exit;
    }
    
} else {
    // Si l'utilisateur n'est pas connecté, il est redirigé vers la page de connexion
    header('Location: http://localhost:3000/pages/login.php');
    exit;
}

    $getAllTickets = "http://localhost:4000/tickets/" .$_SESSION["id"];

    // Effectuer la requête GET
    $jsonTickets = file_get_contents($getAllTickets);
    $tickets = json_decode($jsonTickets, true);

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
        <?php if($_SESSION["role"] == "participant"): ?>

            <h1 class="profileTitle">Mes billets</h1>
            <?php foreach($tickets as $ticket): ?>

                <a href="./oneTicket.php?id=<?=$ticket["id"]?>"><p class="billet">Numéro : <?= $ticket["public_code"] ?></p></a> 
                <div class="bgColor1">
                    <p class="eventName">
                        Nom de l'évènement : <?= $ticket["name"] ?>
                    </p>
                    <p class="eventDate">
                        Date : <?= $ticket["date"] ?>
                    </p>
                </div>

            <?php endforeach; ?>
          <?php endif; ?>
        

        <form method="post">
            <input type="submit" class="button" name="logout" value="Me déconnecter">
        </form>
    </div>
</main>
<script src="../JS/index.js"></script>
</body>
</html>
