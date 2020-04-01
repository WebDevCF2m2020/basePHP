<?php

/*
 *
 * EXERCICE
 *
 * Modifiez la fonction pour qu'elle donne l'heure de $temps
 * au format français (recherche sur la fonction date() et strtotime(), (voir fonction time, timestamp),  les tableaux, les conditions if ou switch)
 *
 * Exemple: le lundi 23 mars 2020 à 23h10
 *          le mardi 24 mars 2020 à 03h03
 *          le jeudi 7 mai 2020 à 19h00
 * etc...
 */

function DateFR($temps){

    // variable de sortie de type string
    $sortie = "";

    // on convertit le temps passé en argument (qui est au format datetime "2020-03-05 07:41:46") en temps UNIX en secondes (voir time())
    $temps_converti = strtotime($temps);

    // création du tableau "pseudo" indexé (utilisation date("N") ) de traduction des jours en français
    $jours_fr = [
      1 =>"lundi",
      "mardi",
      "mercredi",
      "jeudi",
      "vendredi",
      "samedi",
      "dimanche",
    ];
    // création du tableau "pseudo" indexé (modification de la valeur de départ de 0 à 1 pour utiliser date("n") => 1 à 12) de traduction des mois en français
    $mois_fr = [
      1 => "janvier",
      "février",
      "mars",
      "avril",
      "mai",
      "juin",
      "juillet",
      "août",
      "septembre",
      "octobre",
      "novembre",
      "décembre",
    ];

    // on ajoute à la valeur de la variable de sortie (.=) le "le " demandé dans l'énoncé
    $sortie .= "le ";

    // on ajoute le jour en français | date("N",$temps_converti) donne le jour de 1 (lundi) à 7 (dimanche), ce qui corresond aux clefs du tableau $jours_fr
    $sortie .= $jours_fr[date("N",$temps_converti)];

    // on ajoute le jour du mois (format 1 à 31)
    $sortie .= " ".date("j",$temps_converti);

    // on ajoute le mois en français (format 1 à 12)
    $sortie .= " ".$mois_fr[date("n",$temps_converti)];

    // on ajoute l'année (format nnnn)
    $sortie .= " ".date("Y",$temps_converti);

    // on ajoute " à "
    $sortie .= " à ";


    return $sortie;
}