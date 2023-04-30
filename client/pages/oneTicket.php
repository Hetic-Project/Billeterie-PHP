<?php
    require_once '../TPL/header.php';
    session_start();
    if (isset($_GET['id'])) {
        $valeur = $_GET['id'];
        $oneTicketUrl = "http://localhost:4000/oneTicket/" .$valeur;
    
        // Effectuer la requête GET
        $jsonOneTicket = file_get_contents($oneTicketUrl);
        $OneTicket = json_decode($jsonOneTicket, true);
        $QRCODE = $OneTicket["public_code"];
    }
?>
        <main class="main">
            <h2 class="facture">Votre facture</h2>
            <p class="pTicket">Numéro de commande : <span class="numCommande"><?= $OneTicket["public_code"]?></span></p>
            <p class="pTicket">Date : <span class="dateTicket"><?= $OneTicket["date"]?></span></p>
            <p class="pTicket">Evènement : <span class="eventTicket"><?= $OneTicket["name"]?></span></p>
            <p class="pTicket">Prix : <span class="prixTicket">20.00€</span></p>
            <input class="impression" id="impression" name="impression" type="button" onclick="imprimer_ticket()" value="Imprimer le ticket" />
            <form action="http://localhost:4000/oneTicket/<?=$valeur ?>" method="POST">
                <button class="impression">Annuler ma participation</button>
            </form>

            <div id="ticket" class="containerTicket">
                <p class="pTicket">Numéro du billet : <span class="numTicket"><?= $OneTicket["public_code"]?></span></p>
                <p class="pTicket">visiteur : <span class="spectatorName"><?= $_SESSION["username"]?></span></p>
                <div class="ticketPlace">
                    <p class="pTicket">Porte : <span class="Porte" id="spanTicket">A</span>Ligne : <span class="numLigne" id="spanTicket">3</span> Siège : <span class="numSiege" id="spanTicket">15</span></p>

                    <div id="qrCode"></div>
                    
                </div>
            </div>
        </main>
        <script src="../JS/index.js"></script>
        <script src="../JS/qrcode.min.js"></script>
        <script>            

            function imprimer_ticket() {

                var prtContent = document.getElementById('ticket');
                var WinPrint = window.open('','','left=0,top=0,width=660,height=800,toolbar=0,titlebar=0,scrollbars=1,status=0');
                WinPrint.document.write(prtContent.innerHTML);
                WinPrint.document.close();
                WinPrint.focus();
                WinPrint.print();
                WinPrint.close();
	    }

            var qrCode = document.getElementById("qrCode");
            qrCode.style.display = "flex";
            new QRCode(qrCode, "<?= $QRCODE ?>")
        </script>
    </body>
</html>