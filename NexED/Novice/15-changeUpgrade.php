<?php

$bedrag = floatval($argv[1]);
$rest = 0;

if (!$bedrag) {
    exit("Geen wisselgeld");
}

define("GELDEENHEDEN", [50, 10, 20, 5, 2, 1]);
$restbedrag = $bedrag;

foreach (GELDEENHEDEN as $valuta) {
    if ($restbedrag >= $valuta) {
        $aantal = floor($restbedrag / $valuta);
        $restbedrag = $restbedrag % $valuta;
        echo "$aantal x $valuta euro" . PHP_EOL;
    }
}



