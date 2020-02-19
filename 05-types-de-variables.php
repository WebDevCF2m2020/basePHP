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
echo "$bool";
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
?>
</body>
</html>
