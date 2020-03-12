<?php
/*
 * Ceci est notre contrôleur frontal
 */

// chargement des dépendances
require_once "config.php";

// on va se connecter à la DB, et mettre notre connexion dans la variable $connect, le @ devant mysqli_connect retire l'affichage de l'erreur par défaut
$connect = @mysqli_connect(DB_HOST,DB_LOGIN,DB_PWD,DB_NAME,DB_PORT);

// Gestionnaire d'erreur, si la connexion a échouée (elle vaut false)
if (!$connect) {

// affichage de l'erreur personnalisée et arrêt du script
    die('Erreur de connexion (N° ' . mysqli_connect_errno() . ') | Message du système: ' . mysqli_connect_error());
}

// $sql contient du... sql
$sql = "SELECT * FROM livredor ORDER BY ladate DESC";

// exécution de la requête sur le serveur sql avec mysqli_query, en cas d'erreur, arrête du script avec "or die()" et affichage de l'erreur avec mysqli_error ou mysqli_errno
$recupData = mysqli_query($connect,$sql) or die("Erreur numéro ".mysqli_errno($connect)." | Description de l'erreur: ".mysqli_error($connect));

while($content = mysqli_fetch_assoc($recupData)){
    ?>
<h3><?=$content['titre']?></h3>
<p><?=$content['texte']?></p>
<p>par <?=$content['auteur']?> le <?=$content['ladate']?></p>
<?php
}