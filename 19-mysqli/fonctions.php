<?php

/*
 *
 * EXERCICE
 *
 * Modifiez la fonction pour qu'elle donne l'heure de $temps
 * au format français (recherche sur la fonction date() et strtotime(), (voir fonction time, timestamp),  les tableaux, les conditions if ou switch)
 *
 * Exemple: Le lundi 23 mars 2020 à 23h10
 *          Le mardi 24 mars 2020 à 03h03
 *          Le jeudi 7 mai 2020 à 19h00
 * etc...
 */

function DateFR($temps){
    // on convertit le temps passé en argument (qui est au format datetime "2020-03-05 07:41:46") en temps UNIX en secondes (voir time())
    $temps_converti = strtotime($temps);



    //return $temps_converti;
}