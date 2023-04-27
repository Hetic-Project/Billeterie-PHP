<?php
ini_set('display_errors', 1);
// inclure les controllers nécessaires
require_once './controllers/eventsController.php';

// récupérer la méthode et l'URL de la requête
$method = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];

//Router
switch($url){
    // Route utilisateur de l'API
    case '/events':
        // j'utillise la class Users
        $controller = new Event();
        if($method == 'GET'){
            // J'utilise la methode getUsers() de la class Users
            $controller->getAllEvent();
        }elseif($method == 'POST'){
            $controller->createEvent();
        }else{
            // en cas de méthode uri inconnue j'envoi une erreur
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET');
        };
        break;
    // Route pour obtenir un événement spécifique
    case preg_match('@^/events/(\d+)$@', $url, $matches) ? $url : '':
        // j'utilise la class Event
        $controller = new Event();
        if($method == 'GET'){
            // J'utilise la methode getOneEvent() de la class Event
            $controller->getOneEvent($matches[1]);
        } elseif($method == 'DELETE') {
            // J'utilise la methode deleteEvent() de la class Event
            $controller->deleteEvent($matches[1]);
        } else {
            // en cas de méthode uri inconnue j'envoi une erreur
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET');
        };
        break;
    case preg_match('@^/events/([\w-]+)$@', $url, $matches) ? $url : '':
        // j'utilise la class Event
        $controller = new Event();
        if($method == 'GET'){
            // J'utilise la methode getOneCategory() de la class Event
            $controller->getOneCategory($matches[1]);
        } else {
            // en cas de méthode uri inconnue j'envoi une erreur
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET');
        };
        break;
    case preg_match('@^/events/update/(\d+)$@', $url, $matches) ? $url : '':
        // j'utilise la class Event
        $controller = new Event();
        if($method == 'POST'){
            // J'utilise la methode updateEvent() de la class Event
            $controller->updateEvent($matches[1]);
        } else {
            // en cas de méthode uri inconnue j'envoi une erreur
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        };
        break;
    default:
        // si aucune route ne correspond j'envoi une erreur
        http_response_code(404);
        break; 
       
}