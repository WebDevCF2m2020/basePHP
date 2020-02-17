<?php
/*
 * Règles des variables en php
 * - Commencer par $
 * - le $ doit être suivi par un _ (underscore) ou une lettre
 * - sensible à la casse, par exemple $Lulu est différent de $lulu
 * - Ne pas utiliser de caractères spéciaux ni d'espace
 * - "-" ne peut être utilisé car c'est un signe de soustraction
 */
echo "<a href='https://www.php.net/manual/fr/language.variables.basics.php' target='_blank'>Règles de nommage des variables</a>";

// valides
$mavariable = 5;
$_coucou = "lulu";
$p325 = 5;

// non valides
$15vm = 3;
$ kjghjhg = 3;
$aaa-jh = 3;

