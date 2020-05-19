<?php
// utilisation d'une session
session_start();

// vérification de l'existance de la session ou de la validité de la session
if(isset($_SESSION['iddemasession'])&&$_SESSION['iddemasession']===session_id()){
    header("Location: ./");
}

// si le formulaire a été envoyé (login AND pwd)
if(isset($_POST['thelogin'],$_POST['thepwd'])) {

    // on récupère les superglobales post en locales traîtées
    $thelogin = htmlspecialchars(strip_tags(trim($_POST['thelogin'])),ENT_QUOTES);
    $thepwd = htmlspecialchars(strip_tags(trim($_POST['thepwd'])),ENT_QUOTES);

    // si les variables locales ne sont pas vide
    if(!empty($thelogin)&&!empty($thepwd)) {

        // connexion à la DB mysqli_28
        $db = mysqli_connect("localhost", "root", "", "mysqli_28", 3308);
        // encodage en utf8
        mysqli_set_charset($db, "utf8");

        // requête
        $sql = "SELECT * FROM utilisateurs WHERE thelogin='$thelogin' AND thepwd='$thepwd';";

        // requête mysqli
        $recup = mysqli_query($db,$sql);

        // si on récupère un utilisateur (connexion réussie)
        if(mysqli_num_rows($recup)===1){
            // util contient toutes les données venant de la requête en tableau associatif
            $util = mysqli_fetch_assoc($recup);

            // on va remplir notre session avec ces données:
            $_SESSION = $util;

            // on va créer notre variable de session de vérification et on va la remplir avec le PHPSESSID de notre session
            $_SESSION['iddemasession'] = session_id();

            // redirection vers l'accueil
            header("Location: ./");
            exit();
        }


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
    <title>Connexion</title>
</head>
<body>
<h1>Connexion</h1>
<p>Connexion pour accéder à mon site</p>
<form action="" name="connexion" method="post">
    <input type="text" name="thelogin" placeholder="Votre login" required><br>
    <input type="password" name="thepwd" placeholder="Votre mot de passe" required><br>
    <input type="submit" value="envoyer"><br>
</form>
<pre><?php var_dump($_POST,$util,$_SESSION)?></pre>
</body>
</html>
