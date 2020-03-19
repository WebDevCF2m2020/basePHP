<?php
// requête: SELECT
$sql = "SELECT * FROM livredor ORDER BY ladate DESC;";

// exécution de la requête
$request = mysqli_query($db,$sql)
// ou en cas d'erreur
or die("Erreur n° ".mysqli_errno($db)." Description : ".mysqli_error($db));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notre livre d'or</title>
</head>
<body>
<div id="header">
<h1>Notre livre d'or</h1>
</div>
<div id="form">
    ici mon formulaire
</div>
<div id="contenu">
<?php
// tant que l'on a des articles venant du SELECT, on stocke les valeurs dans la variable $item, ligne par ligne
while($item = mysqli_fetch_assoc($request)){
    ?>
<h3><?=$item['titre']?></h3>
    <p><?=$item['texte']?></p>
    <p>Par <?=$item['auteur']?> le <?=$item['ladate']?></p>
<?php
}
?>
</div>
</body>
</html>
