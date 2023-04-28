<?php
    require_once './TPL/header_index.php';
    $urlCategoryRugby = "http://localhost:4000/events/Rugby";
    $urlCategoryFootball = "http://localhost:4000/events/Football";

    $rugbyJson = file_get_contents($urlCategoryRugby);
    $footJson = file_get_contents($urlCategoryFootball);

    $dataRugby = json_decode($rugbyJson, true);
    $dataFoot = json_decode($footJson, true);
?>
        <main class="main">

            <h1 class="sport-title">Rugby</h1>

            <div class="all-events">

            <?php 
                $counter = 0;
                foreach($dataRugby as $eventRugby): 
                    if ($counter >= 3) {
                        // Sortir de la boucle foreach lorsque le compteur atteint trois
                        break;
                    }
                    ?>

                    <a class="events-images-links" href="./pages/oneEvent.php?id=<?=$eventRugby["id"]?>"><img src="<?=$eventRugby["picture"]?>" alt="<?=$eventRugby["name"]?>" class="events-image"></a>

                    <?php 
                    $counter++;
                endforeach; 
            ?>

            </div>

            <h1 class="sport-title">Football</h1>

            <div class="all-events">

            <?php 
                $counter = 0;
                foreach($dataFoot as $eventFoot): 
                    if ($counter >= 3) {
                        // Sortir de la boucle foreach lorsque le compteur atteint trois
                        break;
                    }
                    ?>

                    <a class="events-images-links" href="./pages/oneEvent.php?id=<?=$eventFoot["id"]?>"><img src="<?=$eventFoot["picture"]?>" alt="<?=$eventFoot["name"]?>" class="events-image"></a>

                    <?php 
                    $counter++;
                endforeach; 
            ?>
            </div>

            
        </main>
        <script src="./JS/index.js"></script>
    </body>
</html>