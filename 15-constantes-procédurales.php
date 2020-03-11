<?php
// un constante est une sorte de variable... qui ne varie pas! (sauf depuis PHP 7 mais on verra ça plus tard)

// bonne pratique, toujours nommer la constante en majuscule, on la remplit avec des chaines de caractères, des booléens ou des numériques. DEpuis PHP 7, on peut y mettre des tableaux et des objets (qui eux peuvent varier de contenu!)
define("LULU",'ceci est lulu');
echo LULU;

// on veut modifier le constante
define("LULU",'ceci est lulu modifié');
echo LULU;

// Le nom est toujours en majuscule, et le séparateur est l'underscore (_)
define("DB_HOST","localhost");
define("DB_NAME","lulu");


echo "<hr>DB_HOST ou {DB_HOST} ne sont interprétées même dans les doubles guillements!<br>";
echo "concaténation obligatoire pour voir la valeur de DB_HOST : ".DB_HOST;
