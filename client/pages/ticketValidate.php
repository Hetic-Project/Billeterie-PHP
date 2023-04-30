<?php
require_once '../TPL/header.php';
if (isset($_GET['erreur'])) {
    $message = $_GET['erreur'];
}
?>
    <?php if($message == "Ticket déja valider" || $message == "Ticket invalid") : ?>
        <style>
            .red{
                background-color: red;
            }
        </style>
    <?php endif ?>
    <?php if($message == "Ticket validé") : ?>
        <style>
            .red{
                background-color: green;
            }
        </style>
    <?php endif ?>

        <div class="red">
            <main class="main">
                <br>
                <h1 class="error"><?=$message?></h1><br>
                
                <div class="container">
                    <video class="video" id="webcam" autoplay playsinlne></video>
                

                    <form action="http://localhost:4000/validateTicket" method="POST" class="form">
                        
                        <input class="input" type="text" name="code" id="publicCode" placeholder="Code public du billet" required>
                        
                        <input class="submit" type="submit" value="Submit" >
                    </form>
                </div>
                
            </main>
        </div>
        <script src="../JS/index.js"></script>
        <script type="text/javascript" src="https://unpkg.com/webcam-easy/dist/webcam-easy.min.js"></script>
        <script>
            const webCamElement = document.getElementById("webcam");
            const webcam = new Webcam(webCamElement, "user");
            webcam.start();
        </script>
    </body>
</html>