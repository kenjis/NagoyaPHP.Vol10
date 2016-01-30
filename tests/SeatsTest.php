<?php

namespace NagoyaPHP\Vol10;

class SeatsTest extends \PHPUnit_Framework_TestCase
{
    public function testNew()
    {
        $obj = new Seats(6);
        $test = $obj->getSeats();
        $expected = [
            '','','','','','',
        ];
        $this->assertEquals($expected, $test);
    }

    public function testProcessString()
    {
        $obj = new Seats(6);
        $obj->processString('N');
        $test = $obj->getSeats();
        $expected = [
            'N','','','','','',
        ];
        $this->assertEquals($expected, $test);

        $obj->processString('A');
        $test = $obj->getSeats();
        $expected = [
            'N','','A','','','',
        ];
        $this->assertEquals($expected, $test);

        $obj->processString('B');
        $test = $obj->getSeats();
        $expected = [
            'N','','A','','B','',
        ];
        $this->assertEquals($expected, $test);

        $obj->processString('E');
        $test = $obj->getSeats();
        $expected = [
            'N','','A','','B','E',
        ];
        $this->assertEquals($expected, $test);

        $obj->processString('b');
        $test = $obj->getSeats();
        $expected = [
            'N','','A','','','E',
        ];
        $this->assertEquals($expected, $test);

        $obj->processString('B');
        $test = $obj->getSeats();
        $expected = [
            'N','','A','B','','E',
        ];
        $this->assertEquals($expected, $test);

        $obj->processString('Z');
        $test = $obj->getSeats();
        $expected = [
            'N','Z','A','B','','E',
        ];
        $this->assertEquals($expected, $test);

        $obj->processString('n');
        $test = $obj->getSeats();
        $expected = [
            '','Z','A','B','','E',
        ];
        $this->assertEquals($expected, $test);
    }
}
