<?php
/*
 * Récupération de tous les auteurs pour le choix d'un auteur pour l'article
 */
$sql = "SELECT idutilisateur, thelogin, thename FROM utilisateur ORDER BY thelogin ASC;";
$requestUtil = mysqli_query($db,$sql) or die(mysqli_errno($db));
// si on a pas d'utilisateur, on ne peut pas insérer de page, redirection avec header("Location: ./") vers la page d'accueil, on arrête le script de cette page avec exit() ou die()
if(empty(mysqli_num_rows($requestUtil))){
    header("Location: ./");
    exit();
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
    Insertion d'une page
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