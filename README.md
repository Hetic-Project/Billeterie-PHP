# BILLETERIE PHP

## TEAMS

- Lucas YALMAN
- Tom CARDONNEL
- William VANDAL

## Use case

Les organisateurs peuvent :
- se connecter, se déconnecter
- Créer, modifier, supprimer un évènement
- Valider un billet

Les participants peuvent :
- se connecter, se déconnecter
- participer a un évènement / acheter un billet
- annuler leurs participation a un évènement

## MCD

<img src="./images/Mcd-Billet.png" alt="Photo du Mcd">

## Routing de l'API

Base URL du client : http://localhost:3000
Base URL de l'API : http://localhost:4000

## Routing évènements

|  METHODE  |  PATH  |  DESCRIPTION  |
|  -------  |  ----  |  -----------  |
|GET| /events |liste de tous les évènements|
|GET|/events/:id|afficher un évènement|
|DELETE|/events/:id|Supprimer un évènement|
|GET|/events/:category|Liste de tous les évènements d'un sport|
|POST|/events/update/:id|Mettre a jour un évènement|

## Routing Billets

|  METHODE  |  PATH  |  DESCRIPTION  |
|  -------  |  ----  |  -----------  |
|POST| /generateTicket/:id_event/:id_user |créer un billet|
|GET|/tickets/:id_user|afficher tous les billets d'un participant|
|GET|/oneTicket/:id|afficher le détail d'un billet|
|DELETE|/oneTicket/:id|Supprimer un billet|
|POST|/validateTicket|Valider un billet|