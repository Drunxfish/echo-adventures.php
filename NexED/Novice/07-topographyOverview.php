<?php

$hoeveelheid = (int) readline('Hoeveel landen ga je toevoegen ? ' . PHP_EOL);
if ($hoeveelheid != is_numeric($hoeveelheid)) {
    exit("'$hoeveelheid' is geen getaal, probeer het opnieuw !\n");
}


$hoofdstad = [];

foreach (range(1, $hoeveelheid) as $vriend) {
    $land = readline("Welk land wil je toevoegen  ?" . PHP_EOL);

    $hoofdstad[$land] = readline("Wat is he hoofstand van $land" . PHP_EOL);
}

foreach ($hoofdstad as $land => $hoofdstad2) {
    echo "De volgende landen en steden zitten in de  database :" . $land . ', ' . $hoofdstad2 . PHP_EOL;
}
