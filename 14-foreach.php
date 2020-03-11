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
echo "<hr>"
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
echo "<hr>"
?>
</body>
</html>
