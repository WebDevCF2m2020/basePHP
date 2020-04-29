<?php
// requête qui récupère la page grâce à son id avec auteur correspondant
$sql = "SELECT p.idthepage, p.thetitle, p.thetext, p.thedate, 
				u.thelogin, u.thename 
FROM thepage p 
	INNER JOIN utilisateur u 
    ON p.utilisateur_idutilisateur = u.idutilisateur 
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
    $titre = $item['thetitle'];
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
    <title>Page : <?=$titre?></title>
</head>
<body>
<h1>Page : <?=$titre?></h1>
<div id="menu">
    <a href="./">Accueil</a>
    <a href="./?insertion">Insertion d'une page</a>
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
                <h5><?=$item['thetitle']?></h5>
                <p><?=$item['thetext']?></p>
                <h6>Ecrit le <?=$item['thedate']?> par <?=$item['thename']?>, surnommé <?=$item['thelogin']?></h6><hr>
            <?php
        }
        ?>
    </div>
</div>
</body>
</html>
