<?php
session_start();
$_SESSION['log'][$_SERVER['REMOTE_ADDR']][]= "TIME : ".date("Y-m-d H:i:s") .
    " | PAGE : ".$_SERVER['PHP_SELF'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
</head>
<body>
<h1>Accueil</h1>
<?php include "menu.php"?>
<p>Mon numéro de téléphone est ....</p>
<pre><?php var_dump($_SESSION)?></pre>
</body>
</html>
