<?php
/*
 * Update est l'élément le plus complexe du CRUD
 */

// si le formulaire est envoyé (un seul formulaire dans la page)
if(!empty($_POST)){
    // protection de base trim (les espaces avant après) puis strip_tags (retire les balises) puis conversion des caractères spéciaux en entités html
    $thetitle = htmlspecialchars(strip_tags(trim($_POST['thetitle'])),ENT_QUOTES);

    // protection contre les balises, sauf <p><a><br> et <img>
    $thetext = htmlspecialchars(strip_tags($_POST['thetext'],'<p><a><br><img>'),ENT_QUOTES);

    // récupération de la date et conversion en timestamp (secondes UNIX), envoie un int OU, en cas d'erreur, un FALSE (empty fonctionnera)
    $thedate = strtotime($_POST['thedate']);

    // récupération de l'id convertit en entier avec (int) (si attaque = 0)
    $idthepage = (int) $_POST['idthepage'];

    // récupération de l'id utilisateur convertit en entier avec (int) (si attaque = 0)
    $utilisateur_idutilisateur = (int) $_POST['utilisateur_idutilisateur'];

    // vérification que tous les champs sont valides (NOT empty)
    if( !empty($thetitle) &&
        !empty($thetext) &&
        !empty($thedate) &&
        !empty($idthepage) &&
        !empty($utilisateur_idutilisateur)
    ){
        // notre DB nous demande le temps en datetime
        $thedate = date("Y-m-d H:i:s",$thedate);

        // SQL de mise à jour de la table thepage
        $sql="UPDATE thepage 
                SET thetitle='$thetitle', thetext='$thetext', thedate='$thedate',utilisateur_idutilisateur=$utilisateur_idutilisateur                  
              WHERE idthepage = $idthepage ;      
";
        // exécution de la requête
        mysqli_query($db,$sql) or die("Erreur : ".mysqli_errno($db));

        // redirection vers le détail de l'article
        header("Location: ./?affiche=$idthepage");

        // arrêt du script
        exit();


    }else{
        echo "un champs est vide";
    }

}

// requête qui récupère la page grâce à son id avec auteur correspondant
$sql = "SELECT p.idthepage, p.thetitle, p.thetext, p.thedate, p.utilisateur_idutilisateur,
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
    $titre = "Modification : ".$item['thetitle'];
}else{
    $titre = "Erreur 404";
}
/*
 * Chargement de la liste de tous les auteurs pour pouvoir en changer lors de l'update
 */
$sql = "SELECT idutilisateur, thelogin, thename FROM utilisateur ORDER BY thelogin ASC;";
$requestUtil = mysqli_query($db, $sql) or die(mysqli_errno($db));

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
            <form action="" method="post" name="update">
                <p>Titre : <br>
                    <input type="text" name="thetitle" placeholder="Titre" required maxlength="200" value="<?=$item['thetitle']?>" >
                </p>
                <p>Texte : <br>
                    <textarea name="thetext" placeholder="Votre texte ici" required><?=$item['thetext']?></textarea>
                </p>
                <p>Date : <br>
                    <input name="thedate" type="text" placeholder="0000-00-00 00:00:00" value="<?=$item['thedate']?>" required>
                </p>
                <p><input type="submit" value="Envoyer"></p>
                <input type="hidden" name="idthepage" value="<?=$item['idthepage']?>">
                <input type="hidden" name="utilisateur_idutilisateur" value="<?=$item['utilisateur_idutilisateur']?>">
            </form>
               <pre><?php var_dump($_POST); ?></pre>
            <?php
        }
        ?>
    </div>
</div>
</body>
</html>
