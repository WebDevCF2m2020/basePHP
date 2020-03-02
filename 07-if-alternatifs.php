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
<h2>Les switch</h2>
<p>Les switch sont une alternative au if elseif et else, ils vérifient l'égalité du contenu d'une variable</p>
<p> Pages
<a href="?id=1">1</a> | <a href="?id=2">2</a> | <a href="?id=3">3</a> |
    <a href="?id=4">4</a> | <a href="?id=5">5</a> | <a href="?id=6">6</a>
</p>
<hr>
<p>La variable de type get nommée "id" apparaît quand on clique sur un des liens ci-dessus, elle contient un numérique de 1 à 6, nous allons utiliser un switch pour afficher des pages différentes</p>
<p>
    <?php
    // on va vérifier la valeur de la variable get nommée id, $_GET['id'],
    // si elle existe isset : est initialisée
    if(isset($_GET['id'])){
        $idido = $_GET['id'];
        // sinon (elle n'existe pas)
    }else{
        $idido = 1;
    }


switch($idido){
    // $idido vaut 1
    case 1:
        echo "Nous sommes sur la page 1 de notre site";
        // on arrête ici
        break;
    case 2:
        echo "<script>alert('Ceci est la page $idido')</script>";
        break;
    case 3:
        include "01-hello-world.php";
        break;
    // 4 ou 5
    case 4:
    case 5:
        echo "page 4 ou 5 !!! => $idido";
        break;
    case 6:
        echo "Dernière page de notre mini site";
        break;
    default:
        echo "attaque pas mes variable get c......";


}
    ?>
</p>
<pre><?php var_dump($_GET) ?></pre>
</body>
</html>
