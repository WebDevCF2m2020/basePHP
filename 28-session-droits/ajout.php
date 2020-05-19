<?php
// utilisation d'une session
session_start();

// vérification de l'existance de la session ou de la validité de la session
if(!isset($_SESSION['iddemasession'])|| $_SESSION['iddemasession']!==session_id()){
    header("Location: connect.php");
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
    <title>Ajout</title>
</head>
<body>
<h1>Ajout</h1>
<h2>Bienvenue <?=$_SESSION['thelogin']?></h2>
<h3>VOUS AVEZ LA PERMISSION <?=$_SESSION['droit']?></h3>
<p>Ajout d'un article</p>
<p>Permission 0 : accès à tout le site</p>
<p>Permission 1 : accès à tout le site sauf suppression.php</p>
<p>Permission 2 : accès à index.php et ajout.php</p>
<h4>Menu de navigation</h4>
<ul>
    <li><a href="./">Retour à l'accueil</a></li>
    <?php
    switch($_SESSION['droit']){
        case 0:
            echo '<li><a href="ajout.php">Ajouter</a></li>';
            echo '<li><a href="update.php">Mettre à jour</a></li>';
            echo '<li><a href="suppression.php">Supprimer</a></li>';
            break;
        case 1:
            echo '<li><a href="ajout.php">Ajouter</a></li>';
            echo '<li><a href="update.php">Mettre à jour</a></li>';
            break;
        default:
            echo '<li><a href="ajout.php">Ajouter</a></li>';
    }
    ?>
    <li><a href="deconnect.php">Déconnexion</a></li>
</ul>
</body>
</html>
