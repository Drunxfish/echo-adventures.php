<?php

function piramide($num)
{
    for ($i = 0; $i < $num; $i++) {
        for ($j = 0; $j <= $i; $j++) {
            echo "* ";
        }
        echo "\n";
    }
}

$num = readline("Hoeveel stapels wil je hebben ?");
piramide($num);
