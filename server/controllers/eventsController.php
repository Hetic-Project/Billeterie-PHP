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

    function createEvent() {
        
        $name = $_POST['name'];
        $date = $_POST['date'];
        $hour = $_POST['hour'];
        $adress = $_POST['adress'];
        $city = $_POST['city'];
        $zip_code = $_POST['codepostal'];
        $description = $_POST['description'];
        $sport = $_POST['sport'];
        $organizer_id = $_POST['organizer_id'];
        $number_seats = $_POST['number_seats'];
    
        $picture = $_FILES['picture'];
    
        if (!$name || !$date || !$hour || !$adress || !$city || !$zip_code || !$description || !$sport || !$organizer_id || !$number_seats || !$picture) {
            header('HTTP/1.1 400 Bad Request');
            echo json_encode(array('message' => 'Tous les champs sont requis.'));
            return;
        }
    
        $db = new Database();
        $connection = $db->getConnection();
    
        $targetDir = './images/affiches/';
        $fileName = basename($picture['name']);
        $targetPath = $targetDir . $fileName;
    
        // Vérifier si le fichier est une image
        $imageFileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png'])) {
            header('HTTP/1.1 400 Bad Request');
            echo json_encode(array('message' => 'Le fichier doit être une image (jpg, jpeg, png).'));
            return;
        }
    
        // Déplacer le fichier vers le dossier cible
        if (move_uploaded_file($picture['tmp_name'], $targetPath)) {
            $request = $connection->prepare("
                INSERT INTO event
                    (name, picture, date, hour, adress, city, zip_code, description, sport, organizer_id, number_seats)
                VALUES
                    (:name, :picture, :date, :hour, :adress, :city, :zip_code, :description, :sport, :organizer_id, :number_seats)
            ");
    
            $picturePath = 'http://localhost:4000/images/affiches/' . $fileName;
    
            $request->execute(
                [
                    ':name' => $name,
                    ':picture' => $picturePath,
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
    
            // header('Content-Type: application/json');
            // echo json_encode(array('id' => $eventId));
            header('Location: http://localhost:3000/');
            exit();
        } else {
            header('HTTP/1.1 500 Internal Server Error');
            echo json_encode(array('message' => 'Une erreur s\'est produite lors du téléchargement du fichier.'));
        }
    }   

    function updateEvent($eventId) {

        $eventId = $_POST['event_id'];
        $name = $_POST['name'];
        $date = $_POST['date'];
        $hour = $_POST['hour'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $zip_code = $_POST['zip_code'];
        $description = $_POST['description'];
        $sport = $_POST['sport'];
        $organizer_id = $_POST['organizer_id'];
        $number_seats = $_POST['number_seats'];
    
        $picture = $_FILES['picture'];
    
        if (!$eventId || !$name || !$date || !$hour || !$address || !$city || !$zip_code || !$description || !$sport || !$organizer_id || !$number_seats) {
            header('HTTP/1.1 400 Bad Request');
            echo json_encode(array('message' => 'Tous les champs sont requis.'));
            return;
        }
    
        $db = new Database();
        $connection = $db->getConnection();
    
        // Vérifier si une nouvelle image a été téléchargée
        if (!empty($picture['name'])) {
            $targetDir = './images/affiches/';
            $fileName = basename($picture['name']);
            $targetPath = $targetDir . $fileName;
    
            // Vérifier si le fichier est une image
            $imageFileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
            if (!in_array($imageFileType, ['jpg', 'jpeg', 'png'])) {
                header('HTTP/1.1 400 Bad Request');
                echo json_encode(array('message' => 'Le fichier doit être une image (jpg, jpeg, png).'));
                return;
            }
    
            // Supprimer l'ancienne image
            $request = $connection->prepare("SELECT picture FROM event WHERE event_id = :event_id");
            $request->execute([':event_id' => $eventId]);
            $result = $request->fetch(PDO::FETCH_ASSOC);
            $oldPicturePath = $result['picture'];
            if (file_exists($oldPicturePath)) {
                unlink($oldPicturePath);
            }
    
            // Déplacer le nouveau fichier d'image vers le dossier cible
            if (!move_uploaded_file($picture['tmp_name'], $targetPath)) {
                header('HTTP/1.1 500 Internal Server Error');
                echo json_encode(array('message' => 'Une erreur s\'est produite lors du téléchargement du fichier.'));
                return;
            }
    
            $picturePath = 'http://localhost:4000/images/affiches/' . $fileName;
        } else {

            // Conserver l'ancienne image si aucune nouvelle image n'a été téléchargée
            $request = $connection->prepare("SELECT picture FROM event WHERE event_id = :event_id");
            $request->execute([':event_id' => $eventId]);
            $result = $request->fetch(PDO::FETCH_ASSOC);
            $picturePath = $result['picture'];
        }
    
        // Mettre à jour les données de l'événement dans la base de données, y compris le chemin de l'image mise à jour
        $request = $connection->prepare("
            UPDATE event

            SET name = :name, 
            picture = :picture, 
            date = :date, 
            hour = :hour, 
            address = :address, 
            city = :city, 
            zip_code = :zip_code, 
            description = :description, 
            sport = :sport, 
            organizer_id = :organizer_id, 
            number_seats = :number_seats

            WHERE event_id = :event_id
        ");

        $request->execute([
            ':name' => $name,
            ':picture' => $picturePath,
            ':date' => $date,
            ':hour' => $hour,
            ':address' => $address,
            ':city' => $city,
            ':zip_code' => $zip_code,
            ':description' => $description,
            ':sport' => $sport,
            ':organizer_id' => $organizer_id,
            ':number_seats' => $number_seats,
            ':event_id' => $eventId
        ]);

        $connection = null;

        header('Content-Type: application/json');
        echo json_encode(array('message' => 'Événement mis à jour avec succès.'));
    }

    
}
