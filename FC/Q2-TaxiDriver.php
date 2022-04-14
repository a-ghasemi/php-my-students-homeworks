<?php

function show_arr(array $arr){
    foreach($arr as $i => $j){
        echo '['.$i.'] => ';
        echo implode(',',$j);
        echo "\n";
    }
}

//======================================================

$paths = [];
$earnings = [];


function getTripPrice($base, $price,$drop,$pickup,$tip){
    global $paths,$earnings;

    $price += $drop[$base] - $pickup[$base] + $tip[$base];
    if(!isset($paths[$base])) {
        $earnings[] = $price;
        return;
    }
    foreach($paths[$base] as $point){
        getTripPrice($point,$price,$drop,$pickup,$tip);
    }
}

function taxiDriver($pickup, $drop, $tip): int
{
    global $paths,$earnings;

//    $income = fn($i) => $drop[$i] - $pickup[$i] + $tip[$i];


    for($i = 0; $i < count($pickup); $i++){
        for($j = 0; $j < count($pickup); $j++){
            if($i == $j) continue;
            if($drop[$i] <= $pickup[$j]) $paths[$i][] = $j;
        }
    }


    for($i = 0; $i < count($pickup); $i++){
        getTripPrice($i, 0,$drop,$pickup,$tip);
    }


    return max($earnings);
}

$pickup = [0, 2, 9, 10, 11, 12];
$drop = [5, 9, 11, 11, 14, 17];
$tip = [1, 2, 3, 2, 2, 1];

echo taxiDriver($pickup, $drop, $tip);