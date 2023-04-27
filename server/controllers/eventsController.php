<?php

//Inclusion du fichier pour la connexion a la BDD
require_once './debug.php';
require_once './database/client.php';


// Création du controller users

class Event {

    function getAllEvent(){

        $db = new Database();
        $connection = $db->getConnection();
    
        $request = $connection->prepare("SELECT * FROM event");
        $request->execute();
        $events = $request->fetchAll(PDO::FETCH_ASSOC);

        $connection = null;

        header('Content-Type: application/json');
        echo json_encode($events);
    }

    function getOneEvent($id){
        
        $db = new Database();
        $connection = $db->getConnection();
    
        $request = $connection->prepare("SELECT * FROM event WHERE id = :id");
        $request->execute([
            ':id' => $id
        ]);
        $oneEvent = $request->fetch(PDO::FETCH_ASSOC);

        $connection = null;

        header('Content-Type: application/json');
        echo json_encode($oneEvent);
    }

    function getOneCategory($category){

        $db = new Database();
        $connection = $db->getConnection();
    
        $request = $connection->prepare("SELECT * FROM event WHERE sport = :category");
        $request->execute([
            ':category' => $category
        ]);
        $oneEvent = $request->fetchAll(PDO::FETCH_ASSOC);

        $connection = null;

        header('Content-Type: application/json');
        echo json_encode($oneEvent);

    }

    function createEvent(){

        
        $name = $_POST['name'];
        $picture = $_POST['picture'];
        $date = $_POST['date'];
        $hour = $_POST['hour'];
        $adress = $_POST['adress'];
        $city = $_POST['city'];
        $zip_code = $_POST['zip_code'];
        $description = $_POST['description'];
        $sport = $_POST['sport'];
        $organizer_id = $_POST['organizer_id'];
        $number_seats = $_POST['number_seats'];
    
        
        if (!$name || !$date || !$hour || !$adress || !$city || !$zip_code || !$description || !$sport || !$organizer_id || !$number_seats || !$picture) {
            header('HTTP/1.1 400 Bad Request');
            echo json_encode(array('message' => 'Tous les champs sont requis.'));
            return;
        }
    
        
        $db = new Database();
        $connection = $db->getConnection();
    
        
        $request = $connection->prepare("
            INSERT INTO event
                (name, picture, date, hour, adress, city, zip_code, description, sport, organizer_id, number_seats)
            VALUES
                (:name, :picture, :date, :hour, :adress, :city, :zip_code, :description, :sport, :organizer_id, :number_seats)
        ");
    
        
        $request->execute(
            [
                ':name' => $name,
                ':picture' => $picture,
                ':date' => $date,
                ':hour' => $hour,
                ':adress' => $adress,
                ':city' => $city,
                ':zip_code' => $zip_code,
                ':description' => $description,
                ':sport' => $sport,
                ':organizer_id' => $organizer_id,
                ':number_seats' => $number_seats

            ]
        );
    
        
        $eventId = $connection->lastInsertId();
    
        $connection = null;
    
        header('Content-Type: application/json');
        echo json_encode(array('id' => $eventId));
    }

    function updateEvent($id){

        $name = $_POST['name'];
        $picture = $_POST['picture'];
        $date = $_POST['date'];
        $hour = $_POST['hour'];
        $adress = $_POST['adress'];
        $city = $_POST['city'];
        $zip_code = $_POST['zip_code'];
        $description = $_POST['description'];
        $sport = $_POST['sport'];
        $organizer_id = $_POST['organizer_id'];
        $number_seats = $_POST['number_seats'];
    
        if (!$name || !$date || !$hour || !$adress || !$city || !$zip_code || !$description || !$sport || !$organizer_id || !$number_seats || !$picture) {
            header('HTTP/1.1 400 Bad Request');
            echo json_encode(array('message' => 'Tous les champs sont requis.'));
            return;
        }
    
        $db = new Database();
        $connection = $db->getConnection();
    
        $request = $connection->prepare("
            UPDATE event
            SET name = :name,
                picture = :picture,
                date = :date,
                hour = :hour,
                adress = :adress,
                city = :city,
                zip_code = :zip_code,
                description = :description,
                sport = :sport,
                organizer_id = :organizer_id,
                number_seats = :number_seats
            WHERE id = :id
        ");
    
        $request->execute(
            [
                ':name' => $name,
                ':picture' => $picture,
                ':date' => $date,
                ':hour' => $hour,
                ':adress' => $adress,
                ':city' => $city,
                ':zip_code' => $zip_code,
                ':description' => $description,
                ':sport' => $sport,
                ':organizer_id' => $organizer_id,
                ':number_seats' => $number_seats,
                ':id' => $id
            ]
        );
    
        $connection = null;
    
        header('Content-Type: application/json');
        echo json_encode(array('message' => 'L\'événement a été mis à jour avec succès.'));
    }

    function deleteEvent($id){
        $db = new Database();
        $connection = $db->getConnection();
    
        $request = $connection->prepare("DELETE FROM event WHERE id = :id");
    
        $request->execute([
            ':id' => $id
        ]);
    
        $connection = null;
    
        header('Content-Type: application/json');
        echo json_encode(array('message' => 'Événement supprimé avec succès.'));
    }  
    
}
