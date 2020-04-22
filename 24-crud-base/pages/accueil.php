<?php
// requête qui récupère toutes les pages avec auteur correspondant
$sql = "SELECT p.idthepage, p.thetitle, p.thetext, p.thedate, 
				u.idutilisateur, u.thelogin, u.thename 
FROM thepage p 
	INNER JOIN utilisateur u 
    ON p.utilisateur_idutilisateur = u.idutilisateur 
WHERE p.idthepage >10
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
    <a href="./">Accueil</a>
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
            // tant qu'on a des pages
            while ($item = mysqli_fetch_assoc($requete)) {

                echo "<h4>{$item['thetitle']}</h4>";

            }
        }

        ?>
    </div>
</div>
</body>
</html>
