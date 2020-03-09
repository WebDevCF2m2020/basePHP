<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Do While</title>
</head>
<body>
<h1>Do While</h1>
<p>La principale différence par rapport à la boucle while est que la première itération de la boucle do-while est toujours exécutée</p>
<?php
$lulu = mt_rand(0,20);
do{
    echo "$lulu | ";
    $lulu++;
}while($lulu<10);
?>
</body>
</html>
