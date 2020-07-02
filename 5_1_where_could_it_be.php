<?php
function whereCould(array $arr, int $num): int
{
    for ($i = 0; $i < count($arr); $i++) {
        if($num <= $arr[$i]) return $i;
    }
    return $i;
}

//Don't change the below
$arr = array_map("intval", explode(",", readline()));
$num = (int)readline();
echo whereCould($arr, $num);