<?php
function biggestSub(array $nums): int
{
    $ret =-INF;
    $sum = 0;

    for ($i = 0; $i < count($nums); $i++)
    {
        $sum += $nums[$i];
        $ret = max($ret, $sum);
        $sum = max($sum, 0);
    }
    return $ret;
}

//dont change below
$nums = explode(',', readline());
$nums = array_map('intval', $nums);

//$nums = [-2,1,-3,4,-1,2,1,-5,4];
//output = 6

echo biggestSub($nums);