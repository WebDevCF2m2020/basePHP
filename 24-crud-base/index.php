<?php
/*
 *
 * Contrôleur frontal
 *
 */

// PLAN Nous aurons 4 variables get, la première sera l'action, la deuxième sera l'id
/*
 * CRUD => Create Read Update Delete
 *
 * R / index.php => pas de variables GET => afficher tous les pages en résumé par date DESC
 *
 * R /?affiche=2 => variable GET nommée affiche avec l'id de la page comme valeur => Affiche le détail de la page dont l'id est 2
 *
 * C /?insertion => variable GET nommée insertion sans valeur => Affiche le formulaire pour insérer un nouvel article
 *
 * R-U /?miseajour=2 => variable GET nommée miseajour avec l'id de la page comme valeur => Affiche le formulaire de modification de la page dont l'id est 2
 *
 * D /?suppression=2 => variable GET nommée suppression avec l'id de la page comme valeur => supprime la page dont l'id est 2 (avec confirmation)
 */

// connexion à la base de donnée
$db = mysqli_connect("localhost","root","","crudbase",3308);
// on indique que notre connexion est en utf8
mysqli_set_charset($db,"utf8");

/*
 *
 * Index.php est notre
 * ROUTEUR (ROUTER) général
 *
 */

// si on veut afficher le détail d'un article ET que affiche contient un string composé  uniquement d'un entier non signé [0123456789]*   R
if(isset($_GET['affiche']) && ctype_digit($_GET['affiche'])){

    // on convertit le string affiche en int
    $idpage = (int) $_GET['affiche'];

    // appel de la page détail de l'article
    require_once "pages/affiche.php";

// si on veut insérer un nouvel article, existance de la variable get "insertion" C
}elseif (isset($_GET['insertion'])){

    // appel de la page d'insertion
    require_once "pages/insertion.php";

// si on souhaite mettre à jour un article U
}elseif (isset($_GET['miseajour'])){


// si on souhaite supprimer un article D
}elseif (isset($_GET['suppression'])){


// sinon affichage de l'accueil
}else{
   // appel de la page d'accueil
   require_once "pages/accueil.php";
}
