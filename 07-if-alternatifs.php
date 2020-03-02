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
        href="https://www.php.net/manual/fr/function.random-int.php" target="_blank">random_int</a>"cryptographie" :<hr>
<?php
$hasard = mt_rand(1,10);
echo $hasard;

// on peut utiliser le if sans {}, généralement sur une ligne ou quelques unes
if($hasard>=5) echo "<hr>$hasard est plus grand ou égale à 5";

// on peut utiliser des écritures alternatives:
if($hasard<3):
    echo "<hr>$hasard est plus petit que 3";
else:
    echo "<hr>$hasard est plus grand ou égale à 3";
endif;

// condition ternaire, utilisée quand on souhaite un if/else simple | (true)? ceci : ; | (false)? : cela;
echo ($hasard>5)
    ? "<hr>$hasard est plus grand que 5"
    : "<hr>$hasard est plus petit ou égal à 5";

?>
</p>
<hr>

</body>
</html>
