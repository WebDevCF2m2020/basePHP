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
    // les variables déclarées dans une fonction sont locales!,
    $date = date("H:i:s");

    // utilisation du return pour envoyer un résulat
    return $date;
}
/* envoi une faute car la variable est $date locale
echo $date;
*/

// fonction avec un argument OBLIGATOIRE, mais non strictement typé (avant php7)
function secondFunction($arg1){

    // on convertit le texte de notre argument en majuscule
    $response = "| ".strtoupper($arg1)." |";

    // envoi de la réponse
    return $response;
}

// fonction avec argument obligatoire et un argument optionnel
function thirdFunction($arg1,$up=true){

    $response = "| ".$arg1." |";

    // par défaut $up==true || $up === true
    if($up){
        // on met les caractères en majuscule
        $response = strtoupper($response);
    }else{
        // on met les caractères en minuscule
        $response = strtolower($response);
    }
    // envoi de la réponse
    return $response;
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
<h3>firstFunction sans argument</h3>
<p><?php
    // appel de la fonction et affichage du résultat avec un echo
 echo firstFunction();

    ?></p>
<h3>secondFunction avec argument obligatoire</h3>
<p><?php
    // il manque l'argument, erreur fatale, arrêt du script à cette ligne
    // echo secondFunction();

    // PHP peut convertir un numérique en string
    echo secondFunction(2.56);

    echo "<br>";

    // PHP peut convertir un numérique en string, mais pas un tableau!!!, nous avons donc une Notice, le code continue donc à s'exécuter,  mais après l'ajout dans la fonction du strtoupper, PHP nous renvoie un Warning, donc arrêt du script
    //echo secondFunction([]);

    echo secondFunction("coucou les amis");

    echo "<br>";
    ?></p>
<h3>thirdFunction avec argument obligatoire et un argument optionnel</h3>
<h4>! l'argument optionnel se met après les arguments obligatoires</h4>
<p><?php
    echo thirdFunction("Lulu est beau");
    echo "<br>";
    echo thirdFunction("Lulu est beau",true);
    echo "<br>";
    echo thirdFunction("Lulu est beau",false);
    ?></p>
</body>
</html>
