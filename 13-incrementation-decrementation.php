<?php
echo '<p>incrémentation de $a (par 1), $a++ => la modification de la variable est effective dès la ligne suivante (;)</p>';
$a = 0;
echo $a++; // $a vaut toujours 0 avant le ;
echo $a;
echo "<hr>";


echo '<p>incrémentation de $a (par 1), ++$a => elle est effective avant la ligne (;) | plus rare</p>';
$a = 0;
echo ++$a;
echo $a;
echo "<hr>";

echo '<p>décrémentation de $a (par 1), $a-- => la modification de la variable est effective dès la ligne suivante (;)</p>';
$a = 0;
echo $a--;
echo $a;
echo "<hr>";

echo '<p>décrémentation de $a (par 1), --$a => elle est effective avant la ligne (;) | plus rare</p>';
$a = 0;
echo --$a;
echo $a;
echo "<hr>";