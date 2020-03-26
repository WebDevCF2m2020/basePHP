<?php

/**
 * function calculatrice(num,num,["+","-","*","/"]): succes : int or float
 * Basic calculator +, -, *, /
 * num != 0
 * Error: string
 * @param $nombre1
 * @param $nombre2
 * @param string $operateur
 * @return float|int|string
 */
function calculatrice($nombre1, $nombre2, $operateur="+")
{
    // si $nombre1OU (|| or OR) $nombre2 ne sont pas numériques !is_numeric()
    if(!is_numeric($nombre1)||!is_numeric($nombre1)){
        return "Erreur, vos valeurs doivent être numériques";
    }
    // si on arrive ici (pas de return et donc inutilité d'utiliser un else) - conversion en float pour être certain de pouvoir effectuer l'opération, en cas d'erreur de conversion, les nombres vaudont 0
    $nombre1 = (float) $nombre1;
    $nombre2 = (float) $nombre2;

    // si un des nombres vaut 0 (vide), avant ou après la conversion
    if(empty($nombre1)||empty($nombre2)){
        return "Erreur, utiliser des nombres différents de 0";
    }

    // switch pour +-*/
    switch($operateur){
        case "+":
            $result = $nombre1+$nombre2;
            break;
        case "-":
            $result = $nombre1-$nombre2;
            break;
        case "*":
            $result = $nombre1*$nombre2;
            break;
        case "/":
            $result = $nombre1/$nombre2;
            break;
        default:
            $result = "Erreur, opérateur invalide";
    }

    return $result;

}