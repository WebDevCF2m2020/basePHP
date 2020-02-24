<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Types de variables</title>
</head>
<body>
<h1>Types de variables</h1>
<p>Les variables en php sont locales par défaut, elles commencent toujours par le signe $</p>
<h2>Les booléens - boolean - bool</h2>
<p>variable qui ne peut avoir que 2 valeurs différentes: true ou false</p>
<?php
// déclaration des variables
$bool = true;
$bool2 = false;

// affichage des variables
echo "$bool est le résultat renvoyé par echo si la variable vaut true";
echo "<br>";
echo '$bool est non interprétée entre simples guillemets';
echo '<br>';
// protection du simple guillemet avec l'antislash \ pour éviter que PHP interprète le symbole ' comme la fin du echo
echo '$bool2 a comme valeur d\'affichage : "Rien "';
echo "$bool2";

echo '<pre>var_dump($bool,$bool2); va nous afficher:<br>';
// var_dump permet de débugger les variables
var_dump($bool,$bool2);
echo "</pre>";


?>

<h2>Les variables de type texte - text - string - str</h2>
<p>Les variables de type string sont très utilisées, elles sont également les plus risquées à manipuler</p>
<?php
$text = "Bonjour";
$text2 = 'les amis';
echo "$text $text2";
echo "<br>";
echo '$text $text2';
echo "<br>";
// première concaténation avec le .
echo $text." ".$text2;
// deuxième concaténation avec la ,
echo "<br>",$text," ",$text2;

$textedeBDD = "<p id='lulu'>Lorem feugiat nisl.

Proin molestie sagittis commodo arcu ac consectetur. In nunc orci, lacinia eu nulla vitae, aliquam porta nunc.

Vestibulum urna quam, Etiam ut sapien ligula. Duis vel mi eleifend, commodo sapien faucibus, tincidunt velit. Nulla facilisi.

Nam id molestie turpis, ac vulputate neque. Sed eu metus eu arcu maximus sodales. Donec fringilla interdum leo eu mollis. 

Donec molestie lorem nec euismod laoreet. In laoreet ante et velit hendrerit dictum. Donec tristique nulla eu ipsum pellentesque fermentum. Curabitur commodo placerat fringilla. Proin pharetra est eget arcu pharetra vestibulum. </p>";

// transformation des retours à la ligne en br avec nl2br(string)
echo nl2br($textedeBDD);

echo '<pre>var_dump($text,$text2,$textedeBDD); va nous afficher:<br>';
// var_dump permet de débugger les variables
var_dump($text,$text2,$textedeBDD);
echo "</pre>";

?>
<h2>Les numériques entier, integer, int</h2>
<p>Les variables de type int permettent de manipuler des chiffres sans virgule (mais qui peuvent être négatif)</p>
<?php
$lulu="55";// string
$int = 0;
$int2
    =
    5
;
$int3=-7;
$int4 = 189;$int5=-12;
?>
<pre><?php var_dump($lulu,$int,$int2,$int3,$int4,$int5); ?></pre>
<h2>Les numériques à virgule flottante, float</h2>
<p>Fonctionnent comme les int, ! on utilise le "." à la place de la ","</p>
<?php
$float = 0.000000012;
$float2 = -17.24;
$float3 = 124.5;
?>
<pre><?php var_dump($float,$float2,$float3); ?></pre>
<h2>Les tableaux - array - []</h2>
<p>Les tableaux sont des conteneurs permettant de contenir un nombre non limité de données</p>
<h3>Les tableaux indexés</h3>
<p>Ce sont les tableaux par défaut qui ont comme clef des numériques. Le premier numérique est 0</p>
<?php
// tableau indexé
$tableau = array(   "blabla",
                    "lulu",
                    5,
                    7.8,
                    true,
                    NULL,
    );

// on veut afficher des valeurs de ce tableau indexé
echo "<p>$tableau[0] - $tableau[4]</p>";

// l'importance des tableaux indexés:
$dutxt = "coucou";
echo "<p>$dutxt[0]|$dutxt[1]|$dutxt[2]</p>";


// tableau pseudo indexé, mauvaise pratique, risque de bugs
$tab2 = [
    "Coucou",
    "vous allez",
    "bien?",
    88 => "Moi",
    "ça",
    "va",
    5 => "!",
    "Presque",
    "fini!!!",
];
?>
<pre><?php var_dump($tableau,$tab2) ?></pre>
<h3>Les tableaux associatifs</h3>
<p>Ce sont des tableaux où l'on souhaite maîtriser les clefs</p>
<?php
$tabAssoc = [
    "id" => 7,
    "login" => "Lulu",
    "themail" => "lulu@gmail.com",
    "pwd" => "ojf!hjkhd53_27sdti?01",
];
// chaîne concaténée avec des "." car l'interprétation des variables tableaux associatifs (de même pour l'orienté objet) ne sont pas supportés ni interprétés entre "" (double guillemet)
echo "id vaut : ".$tabAssoc['id']."<br>";
// Mais il y a une astuce: entourez la variable de type tableau associatif (ou objet) d'accolades, { } et magie, ça fonctionne ;-)
echo "login vaut : {$tabAssoc['login']} <br>";

?>
<pre><?php
    var_dump($tabAssoc);
    // pour un tableau on peut utiliser print_r, ce qui retire des informations mais rend la tableau plus lisible
    print_r($tabAssoc);

    ?></pre>
<h4>Les tableaux peuvent être "multidimensionnels"</h4>
<?php
$superArray = [
  [
      "id"=>1,
      "titre"=>"Pizza ?",
      "texte"=>"Qui veut une pizza pour midi?",
  ],
  [
      "id"=>2,
      "titre"=>"Tourte ?",
      "texte"=>"Qui veut une tourte pour midi?",
  ],
  [
      "id"=>3,
      "titre"=>"Salade ?",
      "texte"=>[
          "salade niçoise",
          "salade César",
          "salade pêcheur",
          "salade à la grecque",
      ],
  ],
];
?>
<pre><?php
    print_r($superArray);
    var_dump($superArray);
    ?></pre>
<h3>Exercice</h3>
<p>Avec des echo, affichez la valeur depuis la variable $superArray</p>
<p>2</p>
<?php

?><br>
<p>Qui veut une pizza pour midi?</p>
<?php

?><br>
<p>Salade ?</p>
<?php

?><br>
<p>salade niçoise</p>
<?php

?><br>
<p>salade à la grecque</p>
<?php

?><br>
</body>
</html>
