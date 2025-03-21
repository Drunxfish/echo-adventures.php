<?php

if (count($argv) < 2) {
    exit("u bent vergeten om tijdssoort te geven, tijdssorten zijn : d, u, m, s <<< dit zijn verkortingen van : \n d = dag, u = uur, m = minuut, s = second") . PHP_EOL;
}

$totale = 0;

for ($i = 1; $i < count($argv); $i++) {
    $tijd = $argv[$i];

    $hoeveelheid = (int) substr($tijd, 0, -1);
    $type = substr($tijd, -1);

    switch ($type) {
        case "d":
            $totale += 24 * 60 * 60 * $hoeveelheid;
            break;
        case "u":
            $totale += $hoeveelheid * 60 * 60;
            break;
        case "m":
            $totale += $hoeveelheid * 60;
            break;
        case "s":
            $totale += $hoeveelheid;
        case $type != "d" && "u" && "m" && "s":
        case $type === " ":
            echo " u bent vergeten om tijdssoort te geven, tijdssorten zijn : d, u, m, s <<< dit zijn verkortingen van : \n d = dag, u = uur, m = minuut, s = second";
            break;
        default:
            break;
    }
}

echo "De totale tijd is $totale seconden" . PHP_EOL;
