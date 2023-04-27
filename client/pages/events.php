<?php
    ini_set('display_errors', 1);
    require_once '../TPL/header.php';

    // l'url a requêter
    $url = "http://localhost:4000/events";

    // Effectuer la requête GET
    $json = file_get_contents($url);

    if ($json === false) {
        // Gérer les erreurs de requête
        echo 'Erreur lors de la requête.';
    }

    $data = json_decode($json, true);

?>
        <main class="main">

            <h2 class="events-title">Evènements</h2>
            
            <div class="all-events">

            <?php foreach($data as $event): ?>

              <a class="events-images-links" href="./oneEvent.php?<?=$event["id"]?>"><img src="<?=$event["image"]?>" alt="<?=$event["nom"]?>" class="events-image"></a>

            <?php endforeach; ?>

            </div>
            
        </main>
        <script src="../JS/index.js"></script>
    </body>
</html>