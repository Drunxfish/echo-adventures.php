<?php

$band = [
    "Citizen of glass" => 4.50,
    "Night" => 9,
    "New eyes" => 5,
    "strange tail" => 10
];

$totale = 0;
$gemiddelde = 0;
echo "Het album overzicht :  " . PHP_EOL;
foreach ($band as $album => $waarde) {
    echo "$album kost $waarde" . PHP_EOL;
    $totale = $totale + $waarde;
}
$gemiddelde = $totale / count($band);
echo "De totaalbedrag van alle albums is €$totale " . PHP_EOL;
echo "gemiddelde prijs van alle album is €$gemiddelde" . PHP_EOL;




