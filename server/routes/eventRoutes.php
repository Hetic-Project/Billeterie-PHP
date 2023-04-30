<?php
ini_set('display_errors', 1);
// inclure les controllers nécessaires
require_once './controllers/eventsController.php';

// Obtenir le chemin de l'URL demandée
$url = $_SERVER['REQUEST_URI'];

// Obtenir la méthode HTTP actuelle
$method = $_SERVER['REQUEST_METHOD'];

$matched = false;

switch ($url) {
    // Route utilisateur de l'API
    case '/events':
        $controller = new Event();
        if ($method == 'GET') {
            $controller->getAllEvent();
            $matched = true;
        } elseif ($method == 'POST') {
            $controller->createEvent();
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET');
        };
        break;

    // Route pour obtenir un événement spécifique
    case preg_match('@^/events/(\d+)$@', $url, $matches) ? $url : '':
        $controller = new Event();
        if ($method == 'GET') {
            $controller->getOneEvent($matches[1]);
            $matched = true;
        } elseif ($method == 'DELETE') {
            $controller->deleteEvent($matches[1]);
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET');
        };
        break;

    // Route pour obtenir une catégorie spécifique
    case preg_match('@^/events/([\w-]+)$@', $url, $matches) ? $url : '':
        $controller = new Event();
        if ($method == 'GET') {
            $controller->getOneCategory($matches[1]);
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET');
        };
        break;

    // Route pour mettre à jour un événement spécifique
    case preg_match('@^/events/update/(\d+)$@', $url, $matches) ? $url : '':
        $controller = new Event();
        if ($method == 'POST') {
            $controller->updateEvent($matches[1]);
            $matched = true;
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        };
        break;
}