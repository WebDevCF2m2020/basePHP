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
 *          le mercredi 1er avril 2020 à 11h23
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

    // on ajoute le jour du mois (format 1 à 31) | Le client est chiant, il veut 1er au lieu de 1 pour le premier jour du mois

    // en ne prend le jour qu'une seule X pour éviter d'utiliser des date() inutiles
    $jour = date("j",$temps_converti);

    /*
    solution 1 (la moins bonne, le $jour n'est utilisé que pour la condition)
    if($jour==1) {
        $sortie .= " " . date("j", $temps_converti)."er";
    }else{
        $sortie .= " " . date("j", $temps_converti);
    }
    */

    /* solution 2 (utilisation de jour)
    if($jour==1) {
        $sortie .= " $jour"."er";
    }else{
        $sortie .= " $jour";
    }
    */

    /* solution 3 (ok)
    $sortie .= " $jour";
    if($jour==1) $sortie.="er";
    */

    // solution 4, la ternaire $var = (condition)? vrai : faux;
    $sortie .= ($jour==1)? " $jour"."er": " $jour";



    // on ajoute le mois en français (format 1 à 12)
    $sortie .= " ".$mois_fr[date("n",$temps_converti)];

    // on ajoute l'année (format nnnn)
    $sortie .= " ".date("Y",$temps_converti);

    // on ajoute " à "
    $sortie .= " à ";

    // on ajoute l'heure (format 00 à 23) séparée d'un "h" suivie des minutes (00 à 59)
    //$sortie .= date("H",$temps_converti)."h".date("i",$temps_converti);
    // autre manière de le faire, on empêche la conversion du h avec l'antislash \
    $sortie .= date("H\hi",$temps_converti);


    // envoi de la réponse de notre fonction
    return $sortie;
}