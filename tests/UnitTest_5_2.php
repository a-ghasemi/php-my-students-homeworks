<?php


final class UnitTest_5_2 extends PHPUnit\Framework\TestCase
{
    public function testCase1(){
        $this->assertEquals('true', isValid('()'));
        $this->assertEquals('true', isValid('()[]{}'));

//        $x = '(]';
//        $x = '([)]';
//        $x = '{[]}';
//        $x = '({[)}]';
    }
}