<?php


$array1 = array(0 => 'null_a', 2 => 'zwei_a', 3 => 'drei_a');
$array2 = array(1 => 'eins_b', 3 => 'drei_b', 4 => 'vier_b');
$ergebnis = $array1 + $array2;
var_dump($ergebnis);


$a1 = [1,2,3];
$a2 = [4,5,6];

$a1 = $a1 + $a2;

var_dump($a1);