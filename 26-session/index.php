<?php
/*
 * Cette page est l'accueil du site, pas le contrôleur frontal
 */
/*
 * Lancement d'une session
 *
 */
// lancement d'une session et création automatique d'un cookie dans votre navigateur si il n'existe pas déjà lié au domaine nommé par défaut PHPSESSID, un fichier texte est généré également côté serveur, il utilise votre identifiant de session pour savoir que c'est avec vous qu'il communique
session_start();

if(!isset($_SESSION['heurearriveeindex'])) {
    // datetime = YYYY-MM-DD HH:ii:ss
    $_SESSION['heurearriveeindex'] = date("Y-m-d H:i:s");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>accueil d'une session</title>
</head>
<body>
<ul>
    <li><a href="index.php"></a>index</li>
    <li><a href="page.php"></a>page</li>
    <li><a href=""></a>page2</li>
    <li><a href=""></a>page3</li>
</ul>
<p>affichage de votre identifiant de session: <?=session_id()?></p>
<p>affichage de la variable d'arrivée sur la page: <?=$_SESSION['heurearriveeindex']?></p>
</body>
</html>