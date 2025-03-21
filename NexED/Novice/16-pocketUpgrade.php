<?php

$waarde = $argv[1];
if ($waarde != is_numeric($waarde) || $waarde === null) {
    exit("geen wisselgeld");
}


define("AANTAL", [50, 20, 10, 5, 2, 1, 0.5, 0.2, 0.1, 0.05, 0.01]);

foreach (AANTAL as $value) {
    $waarde = round($waarde, 2);
    $keer = floor($waarde / $value);
    $waarde = $waarde - $keer * $value;
    if ($keer > 0) {
        if ($value < 1) {
            $cent = $value * 100;
            echo $keer . " x " . $cent . " cent" . PHP_EOL;
        } else {
            echo $keer . " x " . $value . " euro" . PHP_EOL;
        }
    }
}

