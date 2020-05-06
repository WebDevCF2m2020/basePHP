<?php
// requête qui récupère la page grâce à son id
$sql = "SELECT p.idthepage, p.thetitle 
        FROM thepage p 
        WHERE p.idthepage=$idpage";
// on effectue la requête sql avec gestion d'erreur procédurale or die()
$requete = mysqli_query($db,$sql) or die("Erreur: ".mysqli_errno($db));

// on vérifie si on un résultat $nb == 1 ou $nb == 0
$nb = mysqli_num_rows($requete);

// on a un article
if($nb===1) {
    // si oui on stocke la ligne dans $item
    $item =  mysqli_fetch_assoc($requete);
    // on récupère le titre
    $titre = "Suppression de ".$item['thetitle'];
}else{
    $titre = "Erreur 404";
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
<h1>S<?=$titre?></h1>
<div id="menu">
    <a href="./">Accueil</a>
    <a href="./?insertion"><img src="img/record.png" alt="insérer" title="Insérer une nouvelle page"></a> <a href="./?insertion" title="Insérer une nouvelle page">Insertion d'une page</a>
</div>
<div id="content">
    <div id="pages">
        <?php
        // si on a pas de résultat
        if(empty($nb)){
            echo "<h4>Cette page n'existe plus</h4>";
        // on a au moins une page
        }else {
            ?>
                <h5>Voulez-vous vraiment supprimer la page "<?=$item['thetitle']?>"</h5>

            <?php
        }
        ?>
    </div>
</div>
</body>
</html>
