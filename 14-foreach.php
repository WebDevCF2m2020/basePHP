<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>foreach</title>
</head>
<body>
<h1>Foreach est une façon simple de parcourir des tableaux ou les objets</h1>
<h2>Sur un tableau indexé</h2>
<h3>Que la valeur avec "as $value"</h3>
<pre>foreach ($stagiaires as $valeur){
    echo "$valeur | ";
}</pre>
<?php
// tableau contenant tous les stagiaires de la classe
$stagiaires = ["Mattia","Karim","Lorenzo","Bryan","Laetitia","Rocio","Audrey","Marjorie","Jessica","Alain","Jonathan","Chihab","Kieran","Adrien","Clovis","Thomas","Saadallah","Virgile",];

// on va juste récupérer les valeurs et les afficher, le "as" crée un alias qui est modifié à chaque itération, tant qu'on a des éléments dans le tableau
foreach ($stagiaires as $valeur){
    echo "$valeur | ";
}
echo "<hr>";
?>
<h3>La clef PUIS la valeur avec "as $key => $value"</h3>
<pre>foreach ($stagiaires as $clef => $valeur){
    echo "$clef) $valeur | ";
}</pre>
<?php
// on va juste récupérer les valeurs et les afficher, le "as" crée un alias qui est modifié à chaque itération, tant qu'on a des éléments dans le tableau
foreach ($stagiaires as $clef => $valeur){
    echo "$clef => $valeur | ";
}
echo "<hr>";
?>
<h4>Sur un tableau réellement indexé, on peut aussi utiliser les boucles for, while et même do while</h4>
<h5>Exemple avec for</h5>
<?php
// count compte le nombre d'élément d'un tableau, si le tableau ne change pas de nombre de valeurs pendant la structure itérative, il vaut mieux éviter de le mettre dans la condition du for pour éviter qu'on recompte le nombre d'éléments dans le tableau à chaque itération. !!! count compte à partir de 1!
$nb_stagiaires = count($stagiaires); // 18
echo '$nb_stagiaires, équivalent à count($stagiaires) vaut : '.$nb_stagiaires;
echo "<hr>";
// de 0 à 17 (les clefs du tableau)
for($i=0;$i<$nb_stagiaires;$i++){
    echo "$i => $stagiaires[$i] | ";
}
?>
<p>Vous vous dites "inutile" d'utiliser le for alors qu'on a foreach, le for peut être plus rapide sur un tableau indexé car, si on a pas besoin de toutes les valeurs, le nombre d'itération sera réduite</p>
<p>Exemple: afficher les 3 premiers</p>
<pre>for($i=0;$i<3;$i++){
    echo "$i => $stagiaires[$i] | ";
}</pre>
<?php
for($i=0;$i<3;$i++){
    echo "$i => $stagiaires[$i] | ";
}
?>
<p>Exemple: afficher un stagiaire sur 2</p>
<pre>for($i=0;$i<$nb_stagiaires;$i+=2){
    echo "$i => $stagiaires[$i] | ";
}</pre>
<?php
for($i=0;$i<$nb_stagiaires;$i+=2){
    echo "$i => $stagiaires[$i] | ";
}
?>
</body>
</html>
