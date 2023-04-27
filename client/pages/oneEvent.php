<?php
require_once '../TPL/header.php';
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
                <h2 class="border"><?php $titleEvent ?></h2>

                <div class="informationEvent">
                    <img class="imgEvent" alt="image de l'event" href="<?php $imgEvent ?>">

                    <div class="informationText">
                        <p>A partir du <?php $dateEvent ?></p>
                        <h2><?php $placeEvent ?></h2>
                        <p><?php $adressEvent ?></p>
                    </div>  
                </div>
                <p class="border">Sport - <?php $sportEvent ?></p>
                <p class="border">Organisateur : <?php $organizerEvent ?></p>
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