<?php
require_once '../TPL/header.php';
?>
        <main class="main">
            <h2 class="facture">Votre facture</h2>
            <p class="pTicket">Numéro de commande : <span class="numCommande">0123456789</span></p>
            <p class="pTicket">Date : <span class="dateTicket">01/02/2023</span></p>
            <p class="pTicket">Evènement : <span class="eventTicket">Coupe de france PSG / OM</span></p>
            <p class="pTicket">Prix : <span class="prixTicket">20.00€</span></p>
            <input class="impression" id="impression" name="impression" type="button" onclick="imprimer_ticket()" value="Imprimer le ticket" />

            <div id="ticket" class="containerTicket">
                <p class="pTicket">Numéro du billet : <span class="numTicket">12345</span></p>
                <p class="pTicket">visiteur : <span class="spectatorName">William Vandal</span></p>
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
            new QRCode(qrCode, <?php $qrCodeTicket ?>   )
        </script>
    </body>
</html>