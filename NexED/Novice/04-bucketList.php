<?php

$list = readline("Hoeveel activiteiten wil je toevoegen ? " . PHP_EOL);

if (is_numeric($list)) {
    for ($i = 0; $i < $list; $i++) {
        $data[] = readline("Wat wil je in je bucket list hebben ? " . PHP_EOL);
    }
    foreach ($data as $key => $value) {
        echo "in jouw bucket list staat : $value \n";
    }
} else {
    exit("'$list' is geen getaal, probeer het opnieuw.");
}

