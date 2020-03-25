<?php

function calculatrice($nombre1,$nombre2,$operateur="+")
{
    // si $nombre1OU (|| or OR) $nombre2 ne sont pas numériques !is_numeric()
    if(!is_numeric($nombre1)||!is_numeric($nombre1)){
        return "Erreur, vos opérateurs doivent être numériques";
    }
    // si on arrive ici (pas de return et donc inutilité d'utiliser un else) - conversion en float pour être certain de pouvoir effectuer l'opération, en cas d'erreur de conversion, les nombres vaudont 0
    $nombre1 = (float) $nombre1;
    $nombre2 = (float) $nombre2;

    // si un des nombres vaut 0 (vide), avant ou après la conversion
    if(empty($nombre1)||empty($nombre2)){
        return "Erreur, utiliser des nombres différents de 0";
    }

    // switch pour +-*/ Si vous le temps


}

// Typage fort, sécurité augmentée, future compilation
function calculatriceTypee(float $nombre1, float $nombre2, string $operateur="+"): bool
{
    $operateurs_acceptes = ["+","-","*","/"];
    if(!in_array($operateur,$operateurs_acceptes)) die("Opérateur invalide");

}
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculatrice</title>
</head>
<body>
<?php
//calculatriceTypee(5,2.5,"+");
?>
</body>
</html>