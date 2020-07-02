<?php
$mat = [
    [1122, 1, -1, 30, 12],
    [1, 1, -1, 3.0, 1.2],
    [0, 22, 9, 18, 30],
    [500, 18, 3, -33, -22.21],
    [1, 2, 3, 4, 0],
];

function show_mat(array $mat): void
{
    $max = mat_sizes($mat);

    foreach ($mat as $row) {
        $r = '';
        foreach ($row as $j => $item) {
            $len = $max[$j][0] - strlen($item);
            $space = ((int)$item != $item && $len > 0) ? str_repeat(' ', $len) : '';
            $r .= sprintf("%s %{$max[$j][1]}s,", $space, $item);
        }
//        $r = substr($r,0,strlen($r) - 2);
        echo $r . "\n";
    }
}

function mat_sizes($mat){
    $max = [];
    $col_count = count($mat, 1) / count($mat, 0);
    for ($j = 0; $j < $col_count - 1; $j++) {
        $col = array_column($mat, $j);
        $map = array_map(fn($n) => strlen($n), $col);
        $map2 = array_map(fn($n) => strlen((int)$n), $col);
        $max[$j] = [max($map), max($map2)];
    }
    return $max;
}

show_mat($mat);