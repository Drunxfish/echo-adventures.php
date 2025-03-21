<?php

$hoeveelheid = (int) readline('Hoeveel vrienden zal ik vragen om hun droom ? ' . PHP_EOL);
if (!is_numeric($hoeveelheid)) {
    exit("'$hoeveelheid' is geen getaal, probeer het opnieuw !\n");
}


$droom = [];

foreach (range(1, $hoeveelheid) as $vriend) {
    $naam = readline("Wat is jouw naam ? " . PHP_EOL);

    $droom[$naam] = readline("Wat is jouw droom ? " . PHP_EOL);
}

foreach ($droom as $naam => $droom2) {
    echo "$naam Heeft dit als droom  $droom2" . PHP_EOL;
}

