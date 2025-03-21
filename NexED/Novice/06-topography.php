<?php

$goed = [];
$plaatsen = [
    "Japan" => "Tokyo",
    "Mexico" => "Mexico City",
    "USA" => "Washington D.C.",
    "India" => "New Delhi",
    "Zuid-Korea" => "Seoul",
    "China" => "Peking",
    "Nigeria" => "Abuja",
    "Argentina" => "Buenos Aires",
    "Egypt" => "Cairo",
    "UK" => "London"
];


foreach ($plaatsen as $quiz => $antwoord) {
    $input = readline("Welke Hoofdtad heeft $quiz ? " . PHP_EOL);
    if ($input === $antwoord) {
        echo "$input correct ! " . PHP_EOL;
        $goed[] = $antwoord;
    } else {
        echo "Helaas, $input is niet de hoofdstad van $quiz!" . PHP_EOL;
        echo "Het correcte antwoord is : $antwoord" . PHP_EOL;
    }
}
echo "Je hebt " . count($goed) . " van de 10 goed geraden !" . PHP_EOL;
