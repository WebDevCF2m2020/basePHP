<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les if alternatifs</title>
</head>
<body>
<h1>Les if alternatifs</h1>
<p>Il existe une multitude de manière de faire des if</p>
<p>L'écriture : </p>
<p> On prend un chiffre au hasard entre 1 et 10 - pour le hazard nous utilisons <a href="https://www.php.net/manual/fr/function.rand.php" target="_blank">rand()</a>"lent",
    <a href="https://www.php.net/manual/fr/function.mt-rand.php" target="_blank">mt_rand()</a>"rapide" ou <a
        href="https://www.php.net/manual/fr/function.random-int.php" target="_blank">random_int</a>"cryptographie"
<?php
$hasard = random_int(1,10);
echo $hasard;
?>
</p>
</body>
</html>
