<?php
ini_set('display_errors', 1);
// inclure les controllers nécessaires
require_once './controllers/ticketController.php';

// récupérer la méthode et l'URL de la requête
$method = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];

//Router
switch($url){
    
    case preg_match('@^/generateTicket/(\d+)/(\d+)$@', $url, $matches) ? $url : '':
        
        $controller = new Ticket();
        
        if($method == 'POST'){
            
            $controller->generateTicket($matches[1], $matches[2]);
            $matched = true;

        } else {
          
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        };

        break;
        
    case preg_match('@^/tickets/(\d+)$@', $url, $matches) ? $url : '':
    
        $controller = new Ticket();

        if($method == 'GET'){
            
            $controller->getAllTickets($matches[1]);
            $matched = true;

        } else {
            
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET');
        };

        break;

    case preg_match('@^/oneTicket/(\d+)$@', $url, $matches) ? $url : '':
        
        $controller = new Ticket();

        if($method == 'GET'){
            
            $controller->getOneTicket($matches[1]);
            $matched = true;

        } elseif($method == 'DELETE') {
            
            $controller->deleteTicket($matches[1]);

        } else {
          
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET, DELETE');
        };
        break;
    
    case '/validateTicket':

        $controller = new Ticket();
        if($method == 'GET'){
    
            $controller->validateTicket();
            $matched = true;
    
        }else{
    
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        };
        break;
          
    default:
        // si aucune route ne correspond j'envoi une erreur
        if($matched == false){

            http_response_code(404);
        }
        break; 
       
}