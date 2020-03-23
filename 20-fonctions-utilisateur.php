<?php
/*
Une fonction doit être déclarée avant d'être appelée
Le nommage est le même que celui des variables sans le $
Les fonctions sont sensibles à la casse
Souvant on utilise le mode en uppercase: changeLaDate (non obligatoire)
L'anglais est à privilégié... ou pas
On crée une fonction utilisateur avec la structure de langage function(..){
  // action notre fonction
}
*/

// fonction sans argument
function firstFunction(){
    // les variables déclarées dans une fonction sont locales!, utilisation du return pour envoyer un résulat
    return $date = date("H:i:s");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les fonctions utilisateurs</title>
</head>
<body>
<h1>Les fonctions utilisateurs</h1>
<p>Une fonction est ce que l'on peut appeler un sous programme, une procédure (en cas de non retour de valeur).<br><br>On distingue deux types de fonctions : les "fonctions intégrées" ou "built-in" qui sont incluses par défaut avec les distributions de PHP comme print, is_array, etc... et les fonctions définies par le programmeur, dites aussi "fonctions utilisateur".</p>
<p><?php
    // appel de la fonction
 echo firstFunction();
    ?></p>
</body>
</html>
