<?php
/*
 *
 * CECI est notre formulaire de connexion
 *
 */

/*
 *
 * Si on essaie de se connecter, on vérifie que ce n'est pas une attaque, si le login ET le pwd correspondent à l'admin,
 * Créez une session contenant "idutil", "login", "nomprenom", "heureconnexion" (datetime de l'heure où on s'est connecté) et dans "iddesession" le session_id()
 *
 * Voir 28-session-droits
 *
 */

// lancement d'une session
session_start();

// appel des dépendances
require_once "config.php";
require_once "fonctions.php";

// Appel de notre fonction qui lance une connexion à MySQL
$connect = connectMysql();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion à l'administration</title>
</head>
<body>
<h1>Connexion à l'administration</h1>
<?php
include("menu.php");
?>
<form action="" name="connexion" method="post">
    <input type="text" name="login" placeholder="Votre Login" required><br>
    <input type="password" name="pwd" placeholder="Votre mot de passe" required><br>
    <input type="submit" value="Envoyer">

</form>
<?php
var_dump($_SESSION);
?>
</body>
</html>
