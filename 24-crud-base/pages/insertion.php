<?php
/*
 *
 * Si on a envoyé le formulaire
 *
 */
// superglobale POST non vide
if(!empty($_POST)){

    /*
     * on transforme nos variables POST en variables locales, on va les traîter pour éviter les attaques
     */

    // si idutilisateur n'est pas convertible en entier, il vaudra 0, sinon cette chaîne devient un entier
    $idutilisateur = (int) $_POST['idutilisateur'];

    // protection de base trim (les espaces avant après) puis strip_tags (retire les balises) puis conversion des caractères spéciaux en entités html
    $thetitle = htmlspecialchars(strip_tags(trim($_POST['thetitle'])),ENT_QUOTES);
    // protection contre les balises, sauf <p><a><br> et <img>
    $thetext = htmlspecialchars(strip_tags($_POST['thetext'],'<p><a><br><img>'),ENT_QUOTES);

    // si un des champs est vide
    if(empty($idutilisateur)||empty($thetitle)||empty($thetext)){
        // redirection vers le formulaire non envoyé
        header("Location: ./?insertion");
        exit();
    // sinon on va insérer la page
    }else{
        $sql = "INSERT INTO thepage (thetitle,thetext,utilisateur_idutilisateur) 
                VALUES ('$thetitle','$thetext',$idutilisateur)";
        $envoi = mysqli_query($db,$sql);

        // réussite de l'envoi
        if($envoi){
            header("Location: ./");
            exit();
        }
    }


// on a pas envoyé le formulaire, on sélectionne les auteurs
}else {

    /*
     * Récupération de tous les auteurs pour le choix d'un auteur pour l'article
     */
    $sql = "SELECT idutilisateur, thelogin, thename FROM utilisateur ORDER BY thelogin ASC;";
    $requestUtil = mysqli_query($db, $sql) or die(mysqli_errno($db));
// si on a pas d'utilisateur, on ne peut pas insérer de page, redirection avec header("Location: ./") vers la page d'accueil, on arrête le script de cette page avec exit() ou die()
    if (empty(mysqli_num_rows($requestUtil))) {
        // redirection car pas d'auteurs, une page a toujours besoin d'un auteur
        header("Location: ./");
        // force l'arrêt du script
        exit();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insertion</title>
</head>
<body>
<h1>Insertion dans CRUD-Base</h1>
<div id="menu">
    <a href="./">Accueil</a>
    <img src="img/record.png" alt="insérer" title="Insérer une nouvelle page"> Insertion d'une page
</div>
<div id="content">
    <form action="" method="post" name="insertion">
        <p>Choisir un utilisateur : <br>
        <select name="idutilisateur" required>
            <?php
            while($user = mysqli_fetch_assoc($requestUtil)){
            ?>
            <option value="<?=$user['idutilisateur']?>"><?=$user['thelogin']?> | <?=$user['thename']?></option>
            <?php
            }
            ?>
        </select>
        </p>
        <p>Titre : <br>
        <input type="text" name="thetitle" placeholder="Titre" required maxlength="200">
        </p>
        <p>Texte : <br>
            <textarea name="thetext" placeholder="Votre texte ici" required></textarea>
        </p>
        <p><input type="submit" value="Envoyer"></p>
    </form>
</div>
</body>
</html>