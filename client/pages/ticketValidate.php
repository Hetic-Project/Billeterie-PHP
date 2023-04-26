<?php
require_once '../TPL/header.php';
?>
        <div class="red">
            <main class="main">
                <br>
                <h1 class="code_error">CODE HTTP 401</h1>
                <h1 class="error">ERROR</h1><br>

                <p>Nom: <span class="span" id="printSpectatorName">None</span></p><br>

                <p>Code public du billet: <span class="span" id="printPublicCode">None</span></p>
                
                <div class="container">
                    <video class="video" id="webcam" autoplay playsinlne></video>
                

                    <form action="" method="get" class="form">
                        
                        <input class="input" type="text" name="spectatorName" id="spectatorName" placeholder="Nom de visiteur" required>
                        <input class="input" type="number" name="publicCode" id="publicCode" placeholder="Code public du billet" required>
                        
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