<?php
/*
 *
 * gestion de l'insertion dans la table livredor
 *
 */

// on retire les caractères vides devant et derrière la chaîne | trim()
$letitre = trim($_POST['titre']);

// on retire toutes les balises html, mais aussi javascript etc... sécurité + mise en page
$letitre = strip_tags($letitre);

// on encode les caractères spéciaux en html en utilisant htmlspecialchars($var,...), ENT_QUOTES convertit les ' et les "
$letitre = htmlspecialchars($letitre,ENT_QUOTES);

// idem pour les autres variables $_POST, !!! de respecter l'ordre des parenthèses
$lauteur = htmlspecialchars(strip_tags(trim($_POST['auteur'])),ENT_QUOTES);
$letexte = htmlspecialchars(strip_tags(trim($_POST['texte'])),ENT_QUOTES);

// on vérifie si aucune des variable locales n'est vide !! attaque possibles!
if(!empty($letitre)&&!empty($lauteur)&&!empty($letexte)) {

    // création de la requête
    $sql = "INSERT INTO livredor (titre,auteur,texte) VALUES ('$letitre','$lauteur','$letexte')";

    // exécution de la requête
    mysqli_query($db,$sql) or die("Erreur n° ".mysqli_errno($db)." Description : ".mysqli_error($db));

    // redirection vers l'accueil
    header("Location: ./");

// au moins 1 des variables est vide
}else{
    
    // redirection vers l'accueil
    header("Location: ./");
}
