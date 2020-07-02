<?php
function HugeSum(array $ar): string
{
    $sum = [];
    foreach($ar as $item){
        $item = strrev($item);
        for($i = 0; $i < strlen($item); $i++){
//            if($item[$i] == 0) continue;
            $sum[$i] ??= 0;
            $sum[$i+1] ??= 0;
            $sum[$i] += $item[$i];
            $sum[$i+1] += (int)($sum[$i]/10);
            $sum[$i] %= 10;
        }
    }
    $j = count($sum)-1;
    while($i = $sum[$j--] == 0){
        unset($sum[$j+1]);
    }
    return strrev(implode("", $sum));
}

// Test case
//$ar = [
//    '1'.str_repeat('0',100).'1',
//    '2'.str_repeat('0',99).'2',
//    '3'.str_repeat('0',80).'3',
//    '4'.str_repeat('0',95).'4',
//    '2'.str_repeat('0',101).'5',
//    '1'.str_repeat('0',70).'6',
//];
//show test case inputs
//echo implode(" ",$ar);
//exit;

$x = readline();
$ar = explode(" ",$x);
echo HugeSum($ar);
