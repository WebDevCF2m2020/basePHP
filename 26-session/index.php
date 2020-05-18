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

// si on a pas encore stocké l'heure d'arrivée sur l'index, on crée cette variable de session
if(!isset($_SESSION['heurearriveeindex'])) {
    // datetime = YYYY-mm-dd HH:ii:ss
    $_SESSION['heurearriveeindex'] = date("Y-m-d H:i:s");
}
// si on ne comptabilise pas encore les clics
if(!isset($_SESSION['hit'])){
    // on crée la variable hit et on lui donne la valeur de 1
    $_SESSION['hit']=1;
// sinon
}else{
    // incrémentation du nombre d'affichage de page
    $_SESSION['hit']++;
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
    <li><a href="index.php">index</a></li>
    <li><a href="page.php">page</a></li>
    <li><a href="page2.php">page2</a></li>
    <li><a href="page3.php">page3</a></li>
</ul>
<p>affichage de votre identifiant de session: <?=session_id()?></p>
<p>affichage de la variable d'arrivée sur la page d'index.php: <?=$_SESSION['heurearriveeindex']?></p>
<p>nombre total de pages vues: <?=$_SESSION['hit']?></p>
<pre><?php var_dump($_SESSION); ?></pre>
</body>
</html>