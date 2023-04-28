<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/createEvent.css">
    <link rel="stylesheet" href="../styles/events.css">
    <link rel="stylesheet" href="../styles/home.css">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../styles/oneEvent.css">
    <link rel="stylesheet" href="../styles/oneEventCategory.css">
    <link rel="stylesheet" href="../styles/oneTicket.css">
    <link rel="stylesheet" href="../styles/profil.css">
    <link rel="stylesheet" href="../styles/signIn.css">
    <link rel="stylesheet" href="../styles/ticketValidate.css">
    <link rel="stylesheet" href="../styles/global.css">
    <title>Billeterie-PHP</title>
</head>
<body>
    <header class="header">
        <div class="flex-content-header">
            <div class="header-link">
                <img class="burger" src="../icons/burger.svg" alt="Menu burger"/>
                <h1 class="main-title">Billeterie-PHP</h1>
            </div>
            
            <a class="link-profil" href="../pages/profil.php"><img class="profil" src="../icons/profil.svg" alt=""/></a> 
        </div>

        <form action="" method="GET" class="search">
            <input class="search-input" type="text" placeholder="Evènement, organisateur, lieu">
        </form>

        <nav class="nav">
            <ul class="nav-ul">
                <li class="nav-li"><a href="../index.php" class="nav-a">Accueil</a></li>
                <li class="nav-li"><a href="../pages/events.php" class="nav-a">Évènements</a></li>
                <li class="nav-li"><a href="../pages/signIn.php" class="nav-a">Inscription</a></li>
                <li class="nav-li"><a href="../pages/login.php" class="nav-a">Connexion</a></li>
                <li class="nav-li"><a href="../pages/createEvent.php" class="nav-a">Créer un évènement</a></li>
                <li class="nav-li"><a href="../pages/ticketValidate.php" class="nav-a">Validations Billets</a></li>
            </ul>
        </nav>
    </header>
