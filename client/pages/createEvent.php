<?php
require_once '../TPL/header.php';
session_start();

if (!isset($_SESSION['token'])) {
    header('Location: http://localhost:3000/pages/login.php');
    } else if ($_SESSION['role'] != "organisateur"){
        $message = "il faut etre organisateur pour créer un évènement";
        header('Location: http://localhost:3000?erreur=' . urlencode($message));
        exit;
    }

?>

        <main class="main">
            <h1 class = "EventTitle">Créer un évènement</h1>
            <form action="http://localhost:4000/events" method="POST" enctype="multipart/form-data" class = formcreate>
                <input name="name" type="nom" class="iPLACEHOLDER" placeholder="Nom de l'évènement">
                <textarea name="description" type="nom" class="iDESC" placeholder="Descriptif"></textarea>
                <div class = "inputstyle2">
                    <input name="date" type="date" class="iPLACEHOLDER" placeholder="Date">
                    <input name="hour" type="time" class="iPLACEHOLDER" placeholder="Heure">
                </div>
                <input name="adress" type="nom" class="iPLACEHOLDER" placeholder="Adresse">
                <div class = "inputstyle2">
                    <input name="city" type="nom" class="iPLACEHOLDER" placeholder="Ville">
                    <input name="codepostal" type="nom" class="iPLACEHOLDER" placeholder="CodePostal">
                </div>
                <input name="number_seats" type="nom" class="iPLACEHOLDER" placeholder="Participant max">
                <div class = "inputstyle2">
                    <select name="sport" id="MenuSport">
                        <option value ="none">Sport</option> 
                        <option value = "tennis">Tennis</option>
                        <option value = "football">Football</option>
                        <option value = "rugby">Rugby</option>
                        <option value = "basketball">Basketball</option>
                        <option value = "hokey">Hokey sur glace</option>
                    </select>
                    <input type="file" name="picture" accept="image/png, image/jpeg, image/jpg">
                    <input type="hidden" name="organizer_id" value="<?=$_SESSION['id'] ?>">
                </div>
                <button class = "buttonSubmit margin"> Valider </button>

            </form>
        </main>
        <script src="../JS/index.js"></script>
    </body>
</html>