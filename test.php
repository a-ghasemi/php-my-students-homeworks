<?php
$mat = [
    [  1,  1, -1, 30, 12],
    [  0, 22,  9,   8,  3],
    [500, 18,  3, -33, 22.2],
    [  1,  2,  3,   4,  0],
];

function show_mat($mat)
{
    foreach ($mat as $item) {
        foreach ($item as $value) {
            printf("%' 5.1F,", $value);
        }
        printf("%s\n", chr(8));
    }
}
show_mat($mat);