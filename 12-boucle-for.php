<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>for</title>
</head>
<body>
<h1>For</h1>
<p>For est principalement utilisée pour effectuer une boucle liée à des valeurs numériques</p>
<p>structure for(initialisation; condition; incrémentation/décrémentation ou autre modification)</p>
<p>
<?php
for($i=1;$i<21;$i++){
    echo "$i ) Ligne $i<br>";
}
?>
</p>
<p>
    <?php
    for($i=50;$i>=30;$i--){
        echo "$i ) Ligne $i<br>";
    }
    ?>
</p>
<p>on peut initialiser plusieurs variables en les séparant par la virgule "," séparé par ";" on peut avoir plusieurs conditions (on verra plus tard) séparé par ";" des modifications (la virgule sert de séparateur)</p>
<pre>
for($i=0,$j=50 ; $i>20 ; $i++, $j--){
    echo "$j |" ;
}
</pre>
<?php

for($hasard=mt_rand(-100,100),$i=1;$i<=5; $i++,$hasard--){
    echo "$hasard | ";
}
?>
</body>
</html>
