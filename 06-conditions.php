<?php
// nous stockons les secondes récupérées par la fonction date qui a comme argument le "s", il représente les secondes de l'heure de votre machine (). Le résultat est du string
$secondes = date("s");

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les conditions</title>
</head>
<body>
<h1>Les conditions</h1>
<p>Les conditions permettent de tester différents cas de figure, c'est la base de la programmation. Une condition qui
    est toujours vraie ou toujours fausse est une condition inutile!</p>
<h2>SI - if</h2>
<p>Condition qui va vérifier si ce qui est passé en paramètre vaut true (vraie) ou false (faux)</p>
<p>On va vérifier si le numérique $secondes généré par <a href="https://www.php.net/manual/fr/function.date.php"
                                                          target="_blank">date()</a> est impair</p>
<?php
// on vérifie si la division de nos secondes par 2 nous donne une reste (true) % est un modulo, sinon il envoie 0, ce qui correspond à false
if ($secondes % 2) {
    echo "<p>$secondes est un nombre impair</p>";
}

// secondes est au format texte, PHP a converti automatiquement celui-ci en int pour le modulo
var_dump($secondes);

// autre manière de faire la même chose sans modulo, en utilisant ici is_float() => vérifie si le résultat est un numérique à virgule flottante.
if (is_float($secondes / 2)) {
    echo "<p>$secondes est un nombre impair</p>";
}

// autre manière de faire la même chose sans modulo, en utilisant ici is_int() => vérifie si le résultat est un numérique à virgule flottante, le "!" inverse la réponse si c'est vrai => faux, si faux => vrai. is_integer

if (!is_int($secondes / 2)) {
    echo "<p>$secondes est un nombre impair</p>";
}
// si $secondes arrondit par round()
if (round(($secondes) / 2) != ($secondes) / 2) {
    echo "<p>$secondes est un nombre impair</p>";
}
?>
<h2>SINON else</h2>
<p>Le sinon est appelé si la condition if à la quelle il est rattaché vaut false</p>
<?php
// SI
if ($secondes % 2) {
    echo "<p>SI==true | $secondes est un chiffre impair</p>";
// SINON
} else {
    echo "<p>SI==false => SINON | $secondes est un chiffre pair</p>";
}
?>
<h2>SINON SI else if elseif</h2>
<p>Si ce que l'on doit vérifier n'est pas une condition binaire (vrai/faux), on peut utiliser le else if (association du
    else et du if) ou son raccourci: elseif</p>
<?php
// on stocke des données de types différents dans un tableau indexé (clefs automatiques commençant à 0)
$donnees = [
    3,
    5.12,
    "coucou",
    true,
    ["yop"],
    false,
    null,
];
?>
<p>On prend au hasard une clef du tableau grâce à la fonction <a href="https://www.php.net/manual/fr/function.array-rand.php" target="_blank">array_rand()</a></p>
<?php
// clef au hasard du tableau $donnees
$randomKey = array_rand($donnees);

// on récupère la valeur qui est dans le tableau $donnees grâce à sa clef au hasard $donnees[$randomKey]
$values = $donnees[$randomKey];

// si nombre à virgule
if(is_float($values)){
    echo "$values est un float";
}else if(is_int($values)){
    echo "$values est un entier";
}elseif(is_string($values)){
    echo "$values est une chaîne de caractère";
}elseif(is_bool($values)){
    // si c'est un booléen vrai (true), on aurait pu l'écrire if($values==true) ou strictement if($values===true)
    if($values){
        echo "true est un booléen vrai";
    }else{
        echo "false est un booléen faux";
    }
}elseif(is_array($values)){
    echo "$values[0] est le contenu d'un tableau";

// le else final représente la valeur par défaut si toutes les conditions précédentes sont à false, ici nous avons que NULL
}else{
    echo "Nous sommes dans le else final qui vaut null";
}

?>


<pre><?php var_dump($donnees); ?></pre>
</body>
</html>
