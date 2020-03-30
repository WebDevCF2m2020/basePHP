<?php
require_once "23-function-calculatrice.php";
if (isset($_POST['num'])) {
    $resultat = calculatrice((float)$_POST['num'], (float)$_POST['num2'], (string)$_POST['operateur']);
}
if (is_string($resultat)) {
    $resultat = "<p style=color:red>" . "Erreur, vos valeurs doivent être numériques" . "</p>";;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App calculatrice</title>
</head>
<body>
<form method="post" action="">
    <input id="fname" name="num" type="number"><br>

    <input type="number" id="lname" name="num2"><br>
    <SELECT name="operateur" size="1" value="choix de l'opérateur">
        <OPTION value="+">+</OPTION>
        <OPTION value="-">-</OPTION>
        <OPTION value="*">*</OPTION>
        <OPTION value="/">/</OPTION>
    </SELECT>


    <button type="submit">Calculer</button>
</form>
<?php
if (isset($resultat)) {
    echo $_POST['num'] . $_POST['operateur'] . (float)$_POST['num2'] . "=" . $resultat;
}

?>

</body>
</html>
