<?php
/**
 * This file is part of the NagoyaPHP.Vol10
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace NagoyaPHP\Vol10;

class App
{
    public function process($input)
    {
        $inputArray = $this->parseInput($input);

        $seats = new Seats($inputArray['seatCount']);
        $count = strlen($inputArray['queueStr']);
        for ($i = 0; $i < $count; $i++) {
            $seats->processString($inputArray['queueStr'][$i]);
        }

        $output = '';
        foreach ($seats->getSeats() as $str) {
            $output .= $str == '' ? '-' : $str;
        }
        return $output;
    }

    public function parseInput($input)
    {
        $tmp = explode(':', $input);
        return [
            'seatCount' => (int) $tmp[0],
            'queueStr' => $tmp[1],
        ];
    }
}
