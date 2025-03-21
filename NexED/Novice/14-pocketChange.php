<?php

$int = $argv[1];

if ($int < 2) {
    echo "Geen wisselgeld" . PHP_EOL;
    exit();
}

switch ($int) {
    case is_numeric($argv[1]):
        echo intval($int) .
            " X " .
            intval($argv[1] / $argv[1]) .
            " euro" .
            PHP_EOL;
        break;

    default:
        exit("Nah uh");
}
