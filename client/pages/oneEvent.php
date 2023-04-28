<?php
require_once '../TPL/header.php';
// Utilisation de la superglobale $_GET
if (isset($_GET['id'])) {
    $valeur = $_GET['id'];
    $onePageEventUrl = "http://localhost:4000/events/" .$valeur;

    // Effectuer la requête GET
    $jsonOneEvent = file_get_contents($onePageEventUrl);
    $dataOneEvent = json_decode($jsonOneEvent, true);

}
?>
        <main class="main">

            
            <nav aria-label="Breadcrumb" class="breadcrumb">
                <ul>
                    <li><a href="../index.php">Accueil</a></li>
                    <li><a href="<?php $PathCategoryEvent ?>"><?php $categoryEvent ?></a></li>
                    <li><a href="<?php $PathTypeEvent ?>"><?php $typeEvent ?></a></li>
                    <li><span aria-current="page"><?php $nameEvent ?></span></li>
                </ul>
            </nav>
            
            <div class="containerEvent">
                <h2 class="border"><?=$dataOneEvent["name"]?>   </h2>

                <div class="informationEvent">
                    <img class="imgEvent" alt="image de l'event" src="<?=$dataOneEvent["picture"]?>">

                    <div class="informationText">
                        <p>A partir du <?=$dataOneEvent["date"]?></p>
                        <h2><?=$dataOneEvent["city"] . " " . $dataOneEvent["zip_code"]?></h2>
                        <p><?=$dataOneEvent["adress"]?></p>
                    </div>  
                </div>
                <p class="border">Sport - <?=$dataOneEvent["sport"]?></p>
                <!-- <p class="border">Organisateur : <?=$dataOneEvent["name"]?></p> -->
            </div> 

            <div class="containerReasuranceEvent">
                <p class="reasuranceEvent">eTicket</p>
                <p class="reasuranceEvent">Revente</p>
                <button class="buttonSubmit">Acheter</button>  
            </div>

            

            <div class="containerButtonOrga">
                <button class="buttonOrga">Modifier l'evenement</button>
                <button class="buttonOrga">Supprimer l'evenement</button>
            </div>

        </main>
        <script src="../JS/index.js"></script>
    </body>
</html>