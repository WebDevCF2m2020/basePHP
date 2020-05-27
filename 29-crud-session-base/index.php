<?php
/*
 *
 * CECI est notre page d'accueil, pas un contrôlleur frontal !!!
 *
 */
// appel des dépendances
require_once "config.php";
require_once "fonctions.php";

// Appel de notre fonction qui lance une connexion à MySQL
$connect = connectMysql();

// Requête nécessaire pour afficher tous les articles sur la page d'accueil classés par ladate descendante
$sql="SELECT a.idarticle, a.titre, LEFT(a.texte,200) AS texte, a.ladate,
	   u.idutil, u.login, u.nomprenom		
	FROM article a
    INNER JOIN util u 
		ON a.util_idutil = u.idutil
    ORDER BY a.ladate DESC;";

// exécution de la requête
$request = mysqli_query($connect,$sql) or die(mysqli_errno($connect));

// on compte le nombre d'article(s)
$nb = mysqli_num_rows($request);

// vérification de la non existance d'au moins un article:
if($nb===0){
    $affiche = "Pas encore d'article pour le moment";
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
</head>
<body>
<h1>Accueil</h1>
<?php
include("menu.php");

if(isset($affiche)){
?>
<h2><?=$affiche?></h2>
<?php
    // on a au moins un article
}else{
    // on crée une ternaire contanant un "s" si on a plus qu'un article
    $pluriel = ($nb>1) ? "s" : "";

    echo "<h3>Nous avons $nb résultat$pluriel</h3>";
    // tant qu'on a des articles comme résultat de notre requête, on les stockent dans un tableau associatif d'une ligne
    while ($item = mysqli_fetch_assoc($request)){
        ?>
<hr>
<h3><?=$item['titre']?></h3>
        <p><?=$item['texte']?> ... <a href="detailarticle.php?id=<?=$item['idarticle']?>">Lire la suite</a> </p>
        <h5>Le <?=$item['ladate']?> par <?=$item['nomprenom']?> surnommé.e <?=$item['login']?></h5>
        <?php
    }
}
include("menu.php");
?>
</body>
</html>
