<?php
$debut_tot = microtime(true);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Correction Exercice DateFR</title>
</head>
<body>
<h1>Correction Exercice DateFR</h1>
<h2>Valeurs pour tous</h2>
<p>Liste des valeurs en datetime</p>
<p><?php
$a = "2020-03-05 07:41:46";
$b = "2020-02-25 16:34:05";
$c = "2020-02-23 18:54:52";
$d = "2020-02-06 07:44:44";
$e = "2020-01-03 04:24:45";
$f = "2019-03-24 19:48:15";
$g = "2018-06-22 20:39:48";
$h = "2018-05-21 21:33:05";
$i = "2018-05-18 14:45:03";
$j = "2017-04-27 20:41:46";
echo "| $a |<br>| $b |<br>| $c |<br>| $d |<br>| $e |<br>| $f |<br>| $g |<br>| $h |<br>| $i |<br>| $j |";
    ?></p>
<h2>Adrien</h2>
<?php

function DateFR($temps){
    $day = date('w',strtotime($temps));
    $dayTab = array('Dimanche','Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');

    $mouth = date('n',strtotime($temps));
    $mouthTab = array('Janvier', 'Fervier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre');

    $dayNum = date('j',strtotime($temps));
    $hours = date('G',strtotime($temps));
    $minutes = date('i',strtotime($temps));

    $date = $dayTab[$day].' '.$dayNum.' '.$mouthTab[$mouth-1].' à '.$hours.'h'.$minutes.'.';

    return $date;
}
function DateFRAdrien($temps){
    $temps_converti = strtotime($temps);
    $day = date('w',$temps_converti);
    $dayTab = array('Dimanche','Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');

    $mouth = date('n',$temps_converti);
    $mouthTab = array('Janvier', 'Fervier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre');

    $dayNum = date('j',$temps_converti);
    $hours = date('G',$temps_converti);
    $minutes = date('i',$temps_converti);

    $date = $dayTab[$day].' '.$dayNum.' '.$mouthTab[$mouth-1].' à '.$hours.'h'.$minutes.'.';

    return $date;
}

$debut_adrien = microtime(true);
echo DateFR($a)."<br>";
echo DateFR($b)."<br>";
echo DateFR($c)."<br>";
echo DateFR($d)."<br>";
echo DateFR($e)."<br>";
echo DateFR($f)."<br>";
echo DateFR($g)."<br>";
echo DateFR($h)."<br>";
echo DateFR($i)."<br>";
echo DateFR($j)."<br>";
$fin_adrien = microtime(true);
echo "<br>Temps total de la fonction : ".($fin_adrien-$debut_adrien)." secondes<hr>";

echo "<h3>Adrien après optimisation</h3>";
$debut_adrienc = microtime(true);
echo DateFRAdrien($a)."<br>";
echo DateFRAdrien($b)."<br>";
echo DateFRAdrien($c)."<br>";
echo DateFRAdrien($d)."<br>";
echo DateFRAdrien($e)."<br>";
echo DateFRAdrien($f)."<br>";
echo DateFRAdrien($g)."<br>";
echo DateFRAdrien($h)."<br>";
echo DateFRAdrien($i)."<br>";
echo DateFRAdrien($j)."<br>";
$fin_adrienc = microtime(true);
echo "<br>Temps total de la fonction : ".($fin_adrienc-$debut_adrienc)." secondes<hr>";
?>
<h2>Thomas</h2>
<?php
function dateFR2($temps)
{
    $jour = [
        "Monday" => "lundi",
        "Tuesday" => "mardi",
        "Wednesday" => "mercredi",
        "Thursday" => "jeudi",
        "Friday" => "vendredi",
        "Saturday" => "samedi",
        "Sunday" => "dimanche"];

    $mois = [
        "01" => 'Janvier',
        "02" => 'Février',
        "03" => 'Mars',
        "04" => 'Avril',
        "05" => 'Mai',
        "06" => 'Juin',
        "07" => 'Juillet',
        "08" => 'Août',
        "09" => 'Septembre',
        "10" => 'Octobre',
        "11" => 'Novembre',
        "12" => 'Décembre'];
    $hour = date('H:i ', strtotime($temps));
    $day = date('l', strtotime($temps));
    $month = date('m', strtotime($temps));
    $dayint = date("d",strtotime($temps));

    return $jour[$day]." " .$dayint." ". $mois[$month] . " à " . $hour;
}

function dateFR2Thomas($temps)
{
    $temps_converti = strtotime($temps);
    $jour = [
        "Monday" => "lundi",
        "Tuesday" => "mardi",
        "Wednesday" => "mercredi",
        "Thursday" => "jeudi",
        "Friday" => "vendredi",
        "Saturday" => "samedi",
        "Sunday" => "dimanche"];

    $mois = [
        "01" => 'Janvier',
        "02" => 'Février',
        "03" => 'Mars',
        "04" => 'Avril',
        "05" => 'Mai',
        "06" => 'Juin',
        "07" => 'Juillet',
        "08" => 'Août',
        "09" => 'Septembre',
        "10" => 'Octobre',
        "11" => 'Novembre',
        "12" => 'Décembre'];
    $hour = date('H:i ', $temps_converti);
    $day = date('l', $temps_converti);
    $month = date('m', $temps_converti);
    $dayint = date("d",$temps_converti);

    return $jour[$day]." " .$dayint." ". $mois[$month] . " à " . $hour;
}

$debut_Thomas = microtime(true);
echo DateFR2($a)."<br>";
echo DateFR2($b)."<br>";
echo DateFR2($c)."<br>";
echo DateFR2($d)."<br>";
echo DateFR2($e)."<br>";
echo DateFR2($f)."<br>";
echo DateFR2($g)."<br>";
echo DateFR2($h)."<br>";
echo DateFR2($i)."<br>";
echo DateFR2($j)."<br>";
$fin_Thomas = microtime(true);
echo "<br>Temps total de la fonction : ".($fin_Thomas-$debut_Thomas)." secondes<hr>";
echo "<h3>Thomas après optimisation</h3>";

$debut_Thomas2 = microtime(true);
echo dateFR2Thomas($a)."<br>";
echo dateFR2Thomas($b)."<br>";
echo dateFR2Thomas($c)."<br>";
echo dateFR2Thomas($d)."<br>";
echo dateFR2Thomas($e)."<br>";
echo dateFR2Thomas($f)."<br>";
echo dateFR2Thomas($g)."<br>";
echo dateFR2Thomas($h)."<br>";
echo dateFR2Thomas($i)."<br>";
echo dateFR2Thomas($j)."<br>";
$fin_Thomas2 = microtime(true);
echo "<br>Temps total de la fonction : ".($fin_Thomas2-$debut_Thomas2)." secondes<hr>";
?>
<h2>Audrey</h2>
<?php
function dateFR3($temps)
{

    setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
    $temps = strftime("%A %d %B", strtotime($temps))." à ".strftime("%I", strtotime($temps))."h".strftime("%M", strtotime($temps));

    return $temps ;
}

setlocale(LC_TIME, 'en_EN.utf8', 'eng');

function dateFR3c($temps,$changeLangue=true)
{
    if($changeLangue) {
        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
    }
    $temps = strftime("%A %d %B", strtotime($temps))." à ".strftime("%I", strtotime($temps))."h".strftime("%M", strtotime($temps));

    return $temps ;
}


$debut_Audrey = microtime(true);
echo dateFR3($a)."<br>";
echo dateFR3($b)."<br>";
echo DateFR3($c)."<br>";
echo DateFR3($d)."<br>";
echo DateFR3($e)."<br>";
echo DateFR3($f)."<br>";
echo DateFR3($g)."<br>";
echo DateFR3($h)."<br>";
echo DateFR3($i)."<br>";
echo DateFR3($j)."<br>";
$fin_Audrey = microtime(true);
echo "<br>Temps total de la fonction : ".($fin_Audrey-$debut_Audrey)." secondes<hr>";
echo "<h3>Audrey après optimisation</h3>";

$debut_Audreyc = microtime(true);
echo dateFR3c($a)."<br>";
echo dateFR3c($b,false)."<br>";
echo DateFR3c($c,false)."<br>";
echo DateFR3c($d,false)."<br>";
echo DateFR3c($e,false)."<br>";
echo DateFR3c($f,false)."<br>";
echo DateFR3c($g,false)."<br>";
echo DateFR3c($h,false)."<br>";
echo DateFR3c($i,false)."<br>";
echo DateFR3c($j,false)."<br>";
$fin_Audreyc = microtime(true);
echo "<br>Temps total de la fonction : ".($fin_Audreyc-$debut_Audreyc)." secondes<hr>";

?>
<hr>
<?php
$fin_tot = microtime(true);
echo "Temps de chargement total de la page : ".($fin_tot-$debut_tot)." secondes";
?>
</body>
</html>

