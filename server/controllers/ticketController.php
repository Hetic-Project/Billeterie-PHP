<?php

//Inclusion du fichier pour la connexion a la BDD
require_once './debug.php';
require_once './database/client.php';


// Création du controller users

class Ticket {

    function generateTicket($id_event, $id_user){

        $db = new Database();
        $connection = $db->getConnection();
        
        // Génère une chaîne hexadécimale de 16 caractères
        $private_code = bin2hex(random_bytes(5)); 
        // Génère une chaîne alphanumérique de 10 caractères
        $public_code = bin2hex(random_bytes(5)); 
        
        // Insérer les données dans la table ticket
        $stmt = $connection->prepare("INSERT INTO ticket (public_code, private_code, id_event, id_user) VALUES (:public_code, :private_code, :id_event, :id_user)");
        $stmt->execute([
            ":public_code" => $public_code, 
            ":private_code" => $private_code, 
            ":id_event" => $id_event, 
            ":id_user" => $id_user
        ]);
        
        // header('Content-Type: application/json');
        // echo json_encode(array('message' => 'Ticket généré avec succès'));
        header('Location: http://localhost:3000/pages/profil.php');
    }

    function getAllTickets($id_user){

        $db = new Database();
        $connection = $db->getConnection();
    
        $request = $connection->prepare("SELECT ticket.id, ticket.public_code, event.name, event.date FROM ticket JOIN event ON ticket.id_event = event.id  WHERE id_user = :id_user");

        $request->execute([
            ":id_user" => $id_user
        ]);

        $tickets = $request->fetchAll(PDO::FETCH_ASSOC);

        $connection = null;

        header('Content-Type: application/json');
        echo json_encode($tickets);
    }

    function getOneTicket($id){

        $db = new Database();
        $connection = $db->getConnection();
    
        $request = $connection->prepare("SELECT * FROM ticket JOIN event ON ticket.id_event = event.id  WHERE ticket.id = :id");
        $request->execute([
            ':id' => $id
        ]);
        $oneTicket = $request->fetch(PDO::FETCH_ASSOC);

        $connection = null;

        header('Content-Type: application/json');
        echo json_encode($oneTicket);
    }

    function deleteTicket($id){

        $db = new Database();
        $connection = $db->getConnection();
    
        $request = $connection->prepare("DELETE FROM ticket WHERE id = :id");
    
        $request->execute([
            ':id' => $id
        ]);
    
        $connection = null;
    
        $message = "Votre billet a bien été supprimé";
        header('Location: http://localhost:3000/pages/profil.php?message=' . urlencode($message));
        exit;
    }
    
    function validateTicket(){

        $code = $_POST['code'];

        $db = new Database();
        $connection = $db->getConnection();
    
        // Vérifie si le code public existe dans la table ticket
        $request = $connection->prepare("SELECT * FROM ticket WHERE public_code = :code");
        
        $request->execute([
            ":code" => $code,
        ]);
        $result = $request->fetch(PDO::FETCH_ASSOC);

    
        if ($result) {

            // Vérifier si la valeur du champ scan est égale à 0
            if ($result['scan'] == 0) {
                // Mettre à jour la valeur du champ scan à 1
                $updateRequest = $connection->prepare("UPDATE ticket SET scan = 1 WHERE public_code = :code");
                $updateRequest->execute([
                    ":code" => $code
                ]);
            }else{
                $message = "Ticket déja valider";
                header('Location: http://localhost:3000/pages/ticketValidate.php?erreur=' . urlencode($message));
                exit;
            }

            $message = "Ticket validé";
            header('Location: http://localhost:3000/pages/ticketValidate.php?erreur=' . urlencode($message));
            exit;

        } else {
            $message = "Ticket invalid";
            header('Location: http://localhost:3000/pages/ticketValidate.php?erreur=' . urlencode($message));
            exit;
        }
    }
        
}