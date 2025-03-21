<?php

function validateInp($input)
{
    if ($input != is_numeric($input) || $input === null) {
        exit("geen wisselgeld");
    }
}

function echoeuro($wissel, $value)
{
    echo $wissel . " x " . $value . " euro" . PHP_EOL;
}

function echocent($restcent, $value)
{
    echo $restcent . " x " . $value . " cent" . PHP_EOL;
}



$input = $argv[1];
validateInp($input);
$input = round($input += 0.02, 2, PHP_ROUND_HALF_UP);

define("DATA", [50, 20, 10, 5, 2, 1]);
define("DATA2", [50, 20, 10, 5]);

$geld = intval($input);
$cent = $input - $geld;
$cent = intval(round($cent * 100));

foreach (DATA as $value) {
    $wissel = floor($input / $value);

    if ($wissel >= 1) {
        $input -= - $value * $wissel;
        echoeuro($wissel, $value);
    }
}
foreach (DATA2 as $value) {
    $restcent = floor($cent / $value);
    if ($restcent >= 1) {
        $cent -= $value * $restcent;
        echocent($restcent, $value);
    }
}

?>