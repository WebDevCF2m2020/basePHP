<?php
// requête qui récupère toutes les pages avec auteur correspondant, on va prendre les 60 premiers caractères de thepage.thetext grâce à LEFT(p.thetext,60) AS thetext
$sql = "SELECT p.idthepage, p.thetitle, LEFT(p.thetext,60) AS thetext, p.thedate, 
				u.thelogin, u.thename 
FROM thepage p 
	INNER JOIN utilisateur u 
    ON p.utilisateur_idutilisateur = u.idutilisateur 
ORDER BY p.thedate DESC;";
// on effectue la requête sql
$requete = mysqli_query($db,$sql) or die("Erreur: ".mysqli_errno($db));

// on compte le nombre de ligne de résultats
$nb = mysqli_num_rows($requete);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil du CRUD-Base</title>
</head>
<body>
<h1>Accueil du CRUD-Base</h1>
<div id="menu">
    Accueil
    <a href="./?insertion">Insertion d'une page</a>
</div>
<div id="content">
    <h2>Liste de toutes nos pages</h2>
    <div id="pages">
        <?php
        // si on a pas de résultat
        if(empty($nb)){
            echo "<h4>Pas encore de pages sur le site</h4>";
        // on a au moins une page
        }else {
            echo "<h4>Nombre de pages : $nb</h4>";
            // tant qu'on a des pages, on prend les lignes une par une et on les mets dans $item dans l'ordre des clefs de résultats => $a[0,1,2] => $a[0] => $a[1] => $a[2] => plus de résultats, fin du while
            while ($item = mysqli_fetch_assoc($requete)) {
            ?>
                <h5><?=$item['thetitle']?></h5>
                <p><?=$item['thetext']?> ... <a href="./?affiche=<?=$item['idthepage']?>">Lire la suite</a></p>
                <h6>Ecrit le <?=$item['thedate']?> par <?=$item['thename']?>, surnommé <?=$item['thelogin']?></h6><hr>
            <?php
            }
        }

        ?>
    </div>
</div>
</body>
</html>
