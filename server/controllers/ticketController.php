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
        $private_code = bin2hex(random_bytes(8)); 
        // Génère une chaîne alphanumérique de 10 caractères
        $public_code = bin2hex(random_bytes(5)); 
        
        // Insérer les données dans la table ticket
        $stmt = $connection->prepare("INSERT INTO ticket (public_code, private_code, id_event, id_user) VALUES (:public_code, :private_code, :id_event, :id_user)");
        $stmt->bind_param("ssii", $public_code, $private_code, $id_event, $id_user);
        $stmt->execute([
            ":public_code" => $public_code, 
            ":private_code" => $private_code, 
            ":id_event" => $id_event, 
            ":id_user" => $id_user
        ]);
        
        header('Content-Type: application/json');
        echo json_encode(array('message' => 'Ticket généré avec succès'));
    }

    function getAllTickets($id_user){

        $db = new Database();
        $connection = $db->getConnection();
    
        $request = $connection->prepare("SELECT * FROM ticket WHERE id_user = :id_user");

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
    
        header('Content-Type: application/json');
        echo json_encode(array('message' => 'Ticket supprimé avec succès.'));
    }
    
    function validateTicket($public_code){

        $db = new Database();
        $connection = $db->getConnection();
    
        // Vérifie si le code public existe dans la table ticket
        $request = $connection->prepare("SELECT * FROM ticket WHERE public_code = :public_code");
        
        $request->execute([
            ":public_code" => $public_code,
        ]);
        $result = $request->fetch(PDO::FETCH_ASSOC);

    
        if ($result) {

            // Vérifier si la valeur du champ scan est égale à 0
            if ($result['scan'] == 0) {
                // Mettre à jour la valeur du champ scan à 1
                $updateRequest = $connection->prepare("UPDATE ticket SET scan = 1 WHERE public_code = :public_code");
                $updateRequest->execute([
                    ":public_code" => $public_code
                ]);
            }else{
                header('Content-Type: application/json');
                http_response_code(400);
                echo json_encode(array('message' => 'Ticket déja valide'));
                return;
            }

            header('Content-Type: application/json');
            echo json_encode(array('message' => 'Ticket valide'));

        } else {
            header('Content-Type: application/json');
            http_response_code(400);
            echo json_encode(array('message' => 'Ticket invalide'));
        }
    }
        
}