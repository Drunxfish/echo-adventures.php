<?php

$EOE = readline("Vul een getal in " . PHP_EOL);

if ($EOE % 2 == 0) {
    echo "$EOE is een even getal";
} else {
    echo "$EOE is een oneven getal";
}
