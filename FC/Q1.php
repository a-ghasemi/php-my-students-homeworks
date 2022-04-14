<?php

function uintdiv($a, $b)
{
    $s = (int)($a / $b);
    $t = $a / $b;

    return ($s == $t) ? $s : $s + 1;
}

function minTime($batchSize, $processingTime, $numTasks): int
{

    $max = 0;

    foreach ($numTasks as $i => $num) {
        $div = uintdiv($num, $batchSize[$i]);
        $time = $div * $processingTime[$i];
        $max = max($max, $time);
    }

    return $max;
}


//# Get Array of BatchSize
//$batchSize = array_map("intval", explode(",", readline()));
//# Get Array of PRocessingTime
//$processingTime = array_map("intval", explode(",", readline()));
//# Get Array of NumTasks
//$numTasks = array_map("intval", explode(",", readline()));

//echo minTime($batchSize, $processingTime, $numTasks);

//echo minTime([4, 3], [6, 5], [8, 8]);
echo minTime([3,2,5,7], [5,4,10,12], [10,6,10,5]);