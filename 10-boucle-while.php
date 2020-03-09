<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La boucle while</title>
</head>
<body>
<h1>La boucle while</h1>
<p>La boucle while est le moyen le plus simple d'implémenter une boucle en PHP.</p>
<p>Attention, cette boucle est aussi celle où l'on fait le plus de fautes type boucle infinie</p>
<p>On l'utilisera surtout sur des fonctions</p>
    <pre><?php
    $lulu = 10;
    while($lulu >= 0){
        echo "$lulu | ";
        $lulu = $lulu - 1;
    }
    // concaténation avec le "."
    echo '<p>$lulu vaut maintenant '.$lulu."</p>";
    echo "<hr>";
    // le = sur une variable qui existe déjà, efface le contenu et met une nouvelle valeur
    $lulu = 10;
    while($lulu >= 0){
        echo "$lulu | ";
        // on retire 3 de lulu, le -= permet de retirer n'importe quel numérique de la valeur de départ
        $lulu -= 3;
    }
    echo '<p>$lulu vaut maintenant '.$lulu."</p>";
    echo "<hr>";

    $lulu = 10;
    while($lulu >= 0){
        echo "$lulu | ";
        // on décrémente $lulu, càd on retire 1 de $lulu
        $lulu --;
    }
    echo '<p>$lulu vaut maintenant '.$lulu."</p>";
    echo "<hr>";

        $lulu = 0;
        while($lulu <= 20){
            echo "$lulu | ";
            // on incrémente $lulu, càd on ajoute 1 à $lulu
            $lulu++;

        }
        echo '<p>$lulu vaut maintenant '.$lulu."</p>";
        echo "<hr>";

        $lulu = 0;
        while($lulu <= 20){
            echo "$lulu | ";
            // on ajoute 3 à $lulu
            $lulu += 3;
        }
        echo '<p>$lulu vaut maintenant '.$lulu."</p>";
        echo "<hr>";

        echo "<h3>Exercice 1</h3>";
        echo '<p>$lulu vaut un chiffre au hasard entre -100 et 100</p>';
        echo '<p>faites une boucle tant que $lulu est plus petit que 50, en ajoutant 1 à chaque tour, affichez $lulu | <br>puis une ligne avec $lulu vaut ....</p>';
        $lulu = mt_rand(-100,100);
        while($lulu<50){
            echo $lulu." | ";
            $lulu++;
        }
        echo '<p>$lulu vaut maintenant '.$lulu.'</p>';
        echo "<h3>Exercice 2</h3>";
        echo '<p>$lulu vaut un chiffre au hasard entre 0 et 100</p>';
        echo '<p>faites une boucle tant que $lulu est plus petit que 80, en ajoutant 3 à chaque tour, affichez $lulu | <br>puis une ligne avec $lulu vaut ....</p>';
        $lulu = mt_rand(0,100);
        while($lulu<80) :
            echo $lulu." | ";
            $lulu+=3;
        endwhile;
        echo '<p>$lulu vaut maintenant '.$lulu."</p>";
        echo "<h3>Exercice 3</h3>";
        echo '<p>$lulu vaut un chiffre au hasard entre 0 et 300</p>';
        echo '<p>faites une boucle tant que $lulu est plus grand ou égal à 0, en retirant 1 à chaque tour, affichez $lulu | <br>puis une ligne avec $lulu vaut ....</p>';
        $tt = mt_rand(0,300);
        while($tt>=0){
            echo "$tt | ";
            $tt--;
        }
        echo '<p>$tt vaut maintenant '.$tt."</p>";

    ?>

    </pre>
</body>
</html>
