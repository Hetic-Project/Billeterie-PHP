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

            <?php foreach($dataRugby as $eventRugby): ?>

                <a class="events-images-links" href="./pages/oneEvent.php?id=<?=$eventRugby["id"]?>"><img src="<?=$eventRugby["picture"]?>" alt="<?=$eventRugby["name"]?>" class="events-image"></a>

            <?php endforeach; ?>

            </div>

            <h1 class="sport-title">Football</h1>

            <div class="all-events">

            <?php foreach($dataFoot as $eventFoot): ?>

                <a class="events-images-links" href="./pages/oneEvent.php?id=<?=$eventFoot["id"]?>"><img src="<?=$eventFoot["picture"]?>" alt="<?=$eventFoot["name"]?>" class="events-image"></a>

            <?php endforeach; ?>

            </div>

            
        </main>
        <script src="./JS/index.js"></script>
    </body>
</html>