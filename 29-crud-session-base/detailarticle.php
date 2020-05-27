<?php
/*
 *
 * Affiche le détail d'un article grâce à son id
 *
 */
// appel des dépendances
require_once "config.php";
require_once "fonctions.php";

// vérification de l'existance de la variable get "id", et vérification que seul des numériques sont utilisés (0-9)*
if(isset($_GET['id'])&&ctype_digit($_GET['id'])){
    // convertir en int
    $idarticle = (int) $_GET['id'];
// sinon redirection
}else{
    header("Location: ./");
    exit();
}

// Appel de notre fonction qui lance une connexion à MySQL
$connect = connectMysql();

// requête pour récupérer l'article
$sql ="SELECT a.idarticle, a.titre, a.texte, a.ladate,
	   u.idutil, u.login, u.nomprenom		
	FROM article a
    INNER JOIN util u 
		ON a.util_idutil = u.idutil
    WHERE a.idarticle=$idarticle; ";

// exécution de la requête
$request = mysqli_query($connect,$sql) or die(mysqli_errno($connect));

// on récupère 1 ou 0 article
$nb = mysqli_num_rows($request);

// si on récupère l'article
if($nb){
    $article = mysqli_fetch_assoc($request);
    $titre = "Détail : ".$article['titre'];
}else{
    $affiche = "Erreur 404: Cette page n'existe plus";
    $titre ="Erreur 404";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$titre?></title>
</head>
<body>
<h1><?=$titre?></h1>
<?php
// si on a récupéré l'article
if(isset($article)){
?>
<hr>
<h3><?=$article['titre']?></h3>
<p><?=$article['texte']?></p>
<h5>Le <?=$article['ladate']?> par <?=$article['nomprenom']?> surnommé.e <?=$article['login']?></h5>
<?php
}
?>
</body>
</html>
