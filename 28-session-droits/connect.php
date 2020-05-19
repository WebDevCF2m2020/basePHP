<?php
// utilisation d'une session
session_start();

// si le formulaire a été envoyé

// connexion à la DB mysqli_28
$db = mysqli_connect("localhost","root","","mysqli_28",3308);
// encodage en utf8
mysqli_set_charset($db,"utf8");
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
<pre><?php var_dump($_POST,$_SESSION)?></pre>
</body>
</html>
