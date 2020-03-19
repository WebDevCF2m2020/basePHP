<?php
/*
 *
 * Front Controller
 *
 */

/*
 * Chargement des dépendances
 */
require_once "config.php";

/*
 * Connexion procédurale à notre DB
 */
$db = @mysqli_connect(DB_HOST,DB_LOGIN, DB_PWD, DB_NAME,DB_PORT);

/*
 * Gestion d'erreur en mysqli procédural
 */
if(!$db){
    // affichage de l'erreur et arrêt du scritp : die()
    die("Erreur n° ".mysqli_connect_errno()." Description : ".mysqli_connect_error());
}







// test de requête: SELECT
$sql = "SELECT * FROM livredor";

// exécution de la requête
$request = mysqli_query($db,$sql)
    // ou en cas d'erreur
    or die("Erreur n° ".mysqli_errno($db)." Description : ".mysqli_error($db));

// tant que l'on a des articles venant du SELECT, on stocke les valeurs dans la variable $item, ligne par ligne
while($item = mysqli_fetch_assoc($request)){
    ?>
<h3><?=$item['titre']?></h3>
    <p><?=$item['texte']?></p>
    <p>Par <?=$item['auteur']?> le <?=$item['ladate']?></p>
<?php
}
