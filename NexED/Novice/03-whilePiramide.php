<?php

$B = readline("Hoeveel stapels wil je hebben ? ") . PHP_EOL;



$X = 1;

while ($X <= $B) {
    $J = 1;

    while ($J <= $X) {
        $J++;
        echo "* ";
    }
    $X++;
    echo "\n";
}

