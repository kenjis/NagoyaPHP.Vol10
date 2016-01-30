<?php

namespace NagoyaPHP\Vol10;

class AppTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var App
     */
    protected $obj;

    protected function setUp()
    {
        parent::setUp();
        $this->obj = new App();
    }

    public function testNew()
    {
        $actual = $this->obj;
        $this->assertInstanceOf('\NagoyaPHP\Vol10\App', $actual);
    }

    /**
     * @testWith    ["6:NABEbBZn", "-ZAB-E"]
     *              ["1:A", "A"]
     *              ["1:Aa", "-"]
     *              ["2:AB", "AB"]
     *              ["2:AaB", "B-"]
     *              ["2:AZa", "-Z"]
     *              ["2:AZz", "A-"]
     *              ["3:ABC", "ACB"]
     *              ["3:ABCa", "-CB"]
     *              ["4:ABCD", "ADBC"]
     *              ["4:ABCbBD", "ABDC"]
     *              ["4:ABCDabcA", "-D-A"]
     *              ["5:NEXUS", "NUESX"]
     *              ["5:ZYQMyqY", "ZM-Y-"]
     *              ["5:ABCDbdXYc", "AYX--"]
     *              ["6:FUTSAL", "FAULTS"]
     *              ["6:ABCDEbcBC", "AECB-D"]
     *              ["7:FMTOWNS", "FWMNTSO"]
     *              ["7:ABCDEFGabcdfXYZ", "YE-X-GZ"]
     *              ["10:ABCDEFGHIJ", "AGBHCIDJEF"]
     */
    public function testProcess($input, $expected)
    {
        $test = $this->obj->process($input);
        $this->assertEquals($expected, $test);
    }

    public function testPaserInput()
    {
        $input = '7:ABCDEFGabcdfXYZ';
        $test = $this->obj->parseInput($input);
        $expected = [
            'seatCount' => 7,
            'queueStr' => 'ABCDEFGabcdfXYZ',
        ];
        $this->assertEquals($expected, $test);
    }
}
