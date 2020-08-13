<?php
$romans = [
    'I' => 1,
    'V' => 5,
    'X' => 10,
    'L' => 50,
    'C' => 100,
    'D' => 500,
    'M' => 1000,
];
$romans2 = [
    'IV' => 4,
    'IX' => 9,
    'XL' => 40,
    'XC' => 90,
    'CD' => 400,
    'CM' => 900,
];

function romanToInt(string $s):int {
    global $romans,$romans2;

    $ret = 0;
    while(!empty($s)){
        $a = substr($s,0,2);
        if(isset($romans2[$a])){
            $ret += $romans2[$a];
        }
        else{
            $a = $s[0];
            $ret += $romans[$a] ?? 0;
        }

        $s = substr($s,strlen($a));
    }
    return $ret;
}

//Don't change bellow
$x = trim(fgets(STDIN));
printf("%s -> %d",$x, romanToInt($x));