<?php
/*
 * Ceci sera le contrôleur frontal, càd toutes les requêtes passeront par ce fichier
 */

// si la variable d'url p n'existe pas
if(!isset($_GET["p"])){
    // on importe le fichier accueil.php qui se trouve dans le dossier files, include permet d'importer n'importe quel fichier local
    include "files/accueil.php";

// "p" existe
}else{

    $p = $_GET["p"];

    switch ($p){
        case "tuto":
            include "files/tutoriel.php";
            break;
        case "contact":
            include "files/mecontacter.php";
            break;
        default:
            include "files/accueil.php";
    }
}