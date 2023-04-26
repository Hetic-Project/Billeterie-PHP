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
    
        $request = $connection->prepare("SELECT * FROM event WHERE genre_sport = :category");
        $request->execute([
            ':category' => $category
        ]);
        $oneEvent = $request->fetchAll(PDO::FETCH_ASSOC);

        $connection = null;

        header('Content-Type: application/json');
        echo json_encode($oneEvent);

    }

    function createEvent(){

        
        $nom = $_POST['nom'];
        $image = $_POST['image'];
        $date = $_POST['date'];
        $heure = $_POST['heure'];
        $adresse = $_POST['adresse'];
        $ville = $_POST['ville'];
        $code_postal = $_POST['code_postal'];
        $description = $_POST['description'];
        $genre_sport = $_POST['genre_sport'];
        $organisateur_id = $_POST['organisateur_id'];
        $nombre_places = $_POST['nombre_places'];
    
        
        if (!$nom || !$date || !$heure || !$adresse || !$ville || !$code_postal || !$description || !$genre_sport || !$organisateur_id || !$nombre_places || !$image) {
            header('HTTP/1.1 400 Bad Request');
            echo json_encode(array('message' => 'Tous les champs sont requis.'));
            return;
        }
    
        
        $db = new Database();
        $connection = $db->getConnection();
    
        
        $request = $connection->prepare("
            INSERT INTO event
                (nom, image, date, heure, adresse, ville, code_postal, description, genre_sport, organisateur_id, nombre_places)
            VALUES
                (:nom, :image, :date, :heure, :adresse, :ville, :code_postal, :description, :genre_sport, :organisateur_id, :nombre_places)
        ");
    
        
        $request->execute(
            [
                ':nom' => $nom,
                ':image' => $image,
                ':date' => $date,
                ':heure' => $heure,
                ':adresse' => $adresse,
                ':ville' => $ville,
                ':code_postal' => $code_postal,
                ':description' => $description,
                ':genre_sport' => $genre_sport,
                ':organisateur_id' => $organisateur_id,
                ':nombre_places' => $nombre_places

            ]
        );
    
        
        $eventId = $connection->lastInsertId();
    
        $connection = null;
    
        header('Content-Type: application/json');
        echo json_encode(array('id' => $eventId));
    }

    function updateEvent($id){

        $nom = $_POST['nom'];
        $image = $_POST['image'];
        $date = $_POST['date'];
        $heure = $_POST['heure'];
        $adresse = $_POST['adresse'];
        $ville = $_POST['ville'];
        $code_postal = $_POST['code_postal'];
        $description = $_POST['description'];
        $genre_sport = $_POST['genre_sport'];
        $organisateur_id = $_POST['organisateur_id'];
        $nombre_places = $_POST['nombre_places'];
    
        if (!$nom || !$date || !$heure || !$adresse || !$ville || !$code_postal || !$description || !$genre_sport || !$organisateur_id || !$nombre_places || !$image) {
            header('HTTP/1.1 400 Bad Request');
            echo json_encode(array('message' => 'Tous les champs sont requis.'));
            return;
        }
    
        $db = new Database();
        $connection = $db->getConnection();
    
        $request = $connection->prepare("
            UPDATE event
            SET nom = :nom,
                image = :image,
                date = :date,
                heure = :heure,
                adresse = :adresse,
                ville = :ville,
                code_postal = :code_postal,
                description = :description,
                genre_sport = :genre_sport,
                organisateur_id = :organisateur_id,
                nombre_places = :nombre_places
            WHERE id = :id
        ");
    
        $request->execute(
            [
                ':nom' => $nom,
                ':image' => $image,
                ':date' => $date,
                ':heure' => $heure,
                ':adresse' => $adresse,
                ':ville' => $ville,
                ':code_postal' => $code_postal,
                ':description' => $description,
                ':genre_sport' => $genre_sport,
                ':organisateur_id' => $organisateur_id,
                ':nombre_places' => $nombre_places,
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
