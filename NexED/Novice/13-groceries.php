<?php

function soort($list)
{
    foreach ($list as $value) {
        echo $value . PHP_EOL;
    }
}
$list = [];

$product = readline("Wat wil je aan je boodschappenlijst toevoegen?");
array_push($list, $product);


echo "Je boodschappen lijstje bevat nu:" . PHP_EOL;
soort($list);


// Deze echo moet in het midden blijven staan
echo "Bedankt voor het gebruik van de boodschappenlijst!" . PHP_EOL;
while (
    strtolower(
        substr(trim(readline("Wil je meer producten toevoegen? (y/n)")), 0, 1)
    ) === "y"
) {
    $product = readline("Wat wil je aan je boodschappenlijst toevoegen?");
    array_push($list, $product);

    echo "Je boodschappen lijstje bevat nu:" . PHP_EOL;
    soort($list);
}
