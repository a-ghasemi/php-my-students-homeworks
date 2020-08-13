<?php

$memory = [];
function guess_what(?string $feedback): int
{
    global $x, $memory;

    $ret = null;
    $flag = null;
    if (is_null($feedback)) {
        $ret = rand(1, $x);
        $memory['prev'] = $ret;
//        $ret = (int)$x/2;
    } elseif ($feedback == 'too low') {
        $flag = 'l';
        $memory[$flag][] = $memory['prev'];
        $ret = $memory['prev'];
        $ret += isset($memory['u']) ? end($memory['u']) : $x;
        $ret = floor($ret / 2);
    } elseif ($feedback == 'too high') {
        $flag = 'u';
        $memory[$flag][] = $memory['prev'];
        $ret = $memory['prev'];
        $ret += isset($memory['l']) ? end($memory['l']) : 0;
//        $ret += $memory['l'][count($memory) - 2] ?? 0;
        $ret = floor($ret / 2);
    }

    while ($flag && isset($memory[$flag]) && in_array($ret, $memory[$flag])) {
        $ret++;
    }

    $memory['prev'] = $ret;

    return $ret;

}

$x = (int)readline();
$rnd = rand(1, $x);

$count = 0;
$feedback = null;
while (($g = guess_what($feedback)) != $rnd) {
    if ($g > $rnd) $feedback = "too high";
    if ($g < $rnd) $feedback = "too low";

    $count++;
    echo "$count] Your guess: $g, my feedback: $feedback\n";


}
echo "Wow! You found $rnd In $count iteration(s), Well Done!";