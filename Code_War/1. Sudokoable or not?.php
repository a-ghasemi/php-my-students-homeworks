<?php

function checkRows($sudoko):bool
{
    foreach($sudoko as $row){
        rsort($row);

    }
    return true;
}

function checkCols($sudoko):bool
{
    return true;
}

function checkBoxes($sudoko):bool
{
    return true;
}

function isValid(array $sudoko):bool
{
    return (checkRows($sudoko) && checkCols($sudoko) && checkBoxes($sudoko));
}

function showMat(array $sudoko):void
{
    foreach($sudoko as $row){
        foreach($row as $item){
            echo $item;
        }
        echo "\n";
    }
}


function stringToMat(string $mat):array
{
    $mat = str_replace(".","0", $mat);
    $mat = explode("\n",$mat);
    $mat = array_map(function($row){
        $row = str_split($row);
        $row = array_map("intVal",$row);
        return $row;
    }, $mat);

    return $mat;
}

function getInput():string
{
    global $mat1;
    return $mat1;
}

$mat1 = "53..7....
6..195...
.98....6.
8...6...3
4..8.3..1
7...2...6
.6....28.
...419..5
....8..79";

$mat2 = "83..7....
6..195...
.98....6.
8...6...3
4..8.3..1
7...2...6
.6....28.
...419..5
....8..79";

//echo showMat(stringToMat(getInput()));
echo isValid(stringToMat(getInput()))?"true":"false";
