<?php

$a = readline("Welke operatie wil je uitvoeren (+, -, %,)" . PHP_EOL);
if ($a !== '+' && $a !== '-' && $a !== '%') {
    echo " '$a' is geen geldige operatie" . PHP_EOL;
    echo "geldige operaties zijn: +  -  %";
    exit;
}

$b = readline("Eerste getal? " . PHP_EOL);

if (!is_numeric($b)) {
    echo "'$b' is geen getal";
    exit;
} elseif ($b == 0) {
    echo "Met een 0 is het niet mogelijk om operatie uit te voeren.";
    exit;
}

$c = readline("Tweede getal? " . PHP_EOL);

if (!is_numeric($c)) {
    echo "'$c' is geen getal";
    exit;
} elseif ($b == 0) {
    echo "Met een 0 is het niet mogelijk om operatie uit te voeren.";
    exit;
}

if ($a == '+') {
    echo "Uw resultaat is: " . $b + $c;
} elseif ($a == '-') {
    echo "Uw resultaat is: " . $b - $c;
} elseif ($a == '%') {
    echo "Uw resultaat is: " . $b % $c;
}
