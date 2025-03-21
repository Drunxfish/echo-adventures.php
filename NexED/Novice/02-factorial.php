<?php

$FC = readline('Van welk getal wil je de faculteit weten ? ' . PHP_EOL);

$FS = 1;

for ($i = $FC; $i >= 1; $i--) {
    $FS = $FS * $i;
}

echo "De faculteit van $FC is $FS " . PHP_EOL;

