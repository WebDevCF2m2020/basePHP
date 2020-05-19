<?php
// utilisation d'une session
session_start();

// vérification de l'existance de la session ou de la validité de la session
if(!isset($_SESSION['iddemasession'])|| $_SESSION['iddemasession']!==session_id()){
    header("Location: connect.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
</head>
<body>
<h1>Accueil</h1>
<p>Bienvenue sur mon site</p>
</body>
</html>
