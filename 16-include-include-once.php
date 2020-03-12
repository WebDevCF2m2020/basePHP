<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>include et include_once</title>
</head>
<body>
<h1>include et include_once</h1>
<h2>include</h2>
<p>On l'utilise pour inclure du code dans une autre page, généralement on l'utilise que pour les fichiers non critiques, on peut l'appeller plusieurs fois. En cas d'erreur, il n'arrête pas le script</p>
<?php
include "16-b.php";
?>
<p>On l'appelle à nouveau</p>
<?php
include "16-b.php";
?>
<p>Erreur volontaire</p>
<?php
include "16-b.p";
?>
<p>Mais ce texte sera quand même visible</p>
<h2>include_once</h2>
<p>Fait la même chose que l'include, mais ne recharge jamais le fichier plus d'une x</p>
<?php
include_once "16-c.php";
?>
<p>Mais non chargé la deuxième x</p>
<?php
include_once "16-c.php";
?>
</body>
</html>
