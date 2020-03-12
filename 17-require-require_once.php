<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>require et require_once</title>
</head>
<body>
<h1>require et require_once</h1>
<p>On utilise le require pour charger les fichiers importants et/ou de configuration, en cas d'erreur le script est immédiatement arrêté</p>
<?php
require "16-b.php";
echo "<p>$lulu</p>";
$lulu = "no";
echo "<p>$lulu</p>";
?>
<p>Nouvel appel (recharge le fichier)</p>
<?php
require "16-b.php";
echo "<p>$lulu</p>";
?>
<h2>require_once</h2>
<p>identique que require, par contre n'est chargé qu'une X, très pratique pour les fichiers de configurations, de fonctions etc...</p>
<?php
$lulu = "no";
require_once "16-b.php";
echo $lulu;
?>
<p>En cas d'erreur, le script s'arrête avec une erreur grave</p>
<?php
require "16-ZZZZ.php";
?>
<p>ma fin de texte</p>
<p>Qu'on ne verra jamais!</p>
</body>
</html>
