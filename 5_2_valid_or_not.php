<?php
function isValid(string $s): bool
{
    $arr = [];
    for($i = 0; $i < strlen($s); $i++)
    {
        $z = 0;
        switch($s[$i]){
            case '(':
                $arr[] = 1;
            break;
            case '{':
                $arr[] = 2;
            break;
            case '[':
                $arr[] = 3;
            break;
            case ')':
                $z = 1;
            break;
            case '}':
                $z = 2;
            break;
            case ']':
                $z = 3;
            break;
        }

        if($z && array_pop($arr) != $z) return false;
    }

    return empty($arr);
}

//Don't change below
$x = readline();
echo isValid($x)?"true":"false";
