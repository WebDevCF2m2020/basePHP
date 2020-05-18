<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<ul>
    <li><a href="index.php"></a>index</li>
    <li><a href="page.php"></a>page</li>
    <li><a href=""></a>page2</li>
    <li><a href=""></a>page3</li>
</ul>
<p>affichage de votre identifiant de session: <?=session_id()?></p>
<p>affichage de la variable d'arrivée sur la page: <?=$_SESSION['heurearriveeindex']?></p>
</body>
</html>
