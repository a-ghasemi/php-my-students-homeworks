<?php

// $x = 5
// 1,1,1,1,1
// 5, 9, 17, 33, ....
function semi_fibo(int $x, int $n): array
{
    $ret = [];

    $fibs = [];
    for ($i = 0; $i < $x; $i++) {
        $fibs[] = 1;
    }

    for ($i = 0; $i < $n; $i++) {
        $ret[] = $fibs[0];

        $sum = $fibs[0];
        for ($j = 1; $j < $x; $j++) {
            $fibs[$j - 1] = $fibs[$j];
            $sum += $fibs[$j];
        }
        $fibs[$x - 1] = $sum;
    }

    return $ret;
}

//list($x, $inp) = explode(",", fgets(STDIN));
//echo implode(",", semi_fibo(intval($x), intval($inp)));


for ($x = 1; $x < 20; $x++) {
    echo "x = $x\n";
    for ($inp = $x; $inp < $x + 10; $inp++) {
        echo "n = $inp: ";
        echo implode(",", semi_fibo($x, $inp)) . "\n";
    }
    echo "\n";
}
