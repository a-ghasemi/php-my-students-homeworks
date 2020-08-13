<?php

interface SolutionInterface
{
    //Don't change this interface
    // Just write a class that implements this

    /**
     * @param Int $n
     * @return String[]
     */
    function generateParenthesis(int $n): array;
}

class Solution implements SolutionInterface
{
    var $n;

    function generateParenthesis(int $n): array
    {
        $this->n = $n;
        $ret = [];
        $this->func("(", 1,0,$ret);
        return $ret;
    }

    private function func(string $base, int $i, int $j, array &$ret):void
    {
        if($i == $j && $i == $this->n) {$ret[] = $base; return;}

        if($i < $this->n) $this->func($base . "(", $i + 1,$j,$ret);

        if($i > $j && $j < $this->n) $this->func($base . ")", $i, $j+1, $ret);
    }
}

$n = (int) readline();
$solution = new Solution();
$result = $solution->generateParenthesis($n);
print_r($result);