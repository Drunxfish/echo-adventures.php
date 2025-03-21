<?php

$arr = [];
$vrienden = readline("Hoeveel vrienden zal ik vragen om hun droom?" . PHP_EOL);
if (is_numeric($vrienden)) {
    for ($i = 0; $i < ($vrienden); $i++) {
        $naam = readline("Wat is jouw naam?" . PHP_EOL);
        $dromen = readline("Hoeveel dromen ga je opgeven ? " . PHP_EOL);
        $arr2 = [];

        if (is_numeric($dromen)) {
            for ($j = 0; $j < ($dromen); $j++) {
                $droominput = readline("Wat is jouw droom?" . PHP_EOL);
                $arr2[] = $droominput;
            }
            $arr[$naam] = $arr2;
        } else {
            exit("'$vrienden' is geen getaal, probeer het opnieuw ! ") . PHP_EOL;
        }
    }

    foreach ($arr as $naam => $inhoud) {
        foreach ($inhoud as $value => $arr3) {
            echo "$naam heeft dit als  droom : $arr3." . PHP_EOL;
        }
    }
} else {
    exit("'$vrienden' is geen getaal, probeer het opnieuw ! ") . PHP_EOL;
}
