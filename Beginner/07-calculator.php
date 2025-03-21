<?php

$operatie1 = readline("welke operatie wilt u uitvoeren ? (+, -)") ;
$getal1 = readline("Eerste getal ? ") . PHP_EOL ;
$getal2 = readline("Tweede getal ? ") . PHP_EOL ;

if ($operatie1 == "+") {
          echo 'Uw resultaat: ' . $getal1 + $getal2;
}

if ($operatie1 == "-") {
          echo 'Uw resultaat: ' . $getal1 - $getal2;
} 

?>
