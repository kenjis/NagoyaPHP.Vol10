<?php
/**
 * This file is part of the NagoyaPHP.Vol10
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace NagoyaPHP\Vol10;

class Seats
{
    private $count = 0;
    private $seats = [];
    
    public function __construct($count)
    {
        $this->count = $count;
        $this->seats = array_pad([], $count, '');
    }

    public function getSeats()
    {
        return $this->seats;
    }

    public function processString($str)
    {
        if (ctype_upper($str)) {
            // Add
            $seatNo = $this->findEmptySeat($str);
            $this->seats[$seatNo] = $str;
        } else {
            // Remove
            $seatNo = $this->findSeat($str);
            $this->seats[$seatNo] = '';
        }
        
    }

    private function findSeat($str)
    {
        $str = strtoupper($str);
        return array_search($str, $this->seats);
    }

    private function findEmptySeat($str)
    {
        // Rule 1
        foreach ($this->seats as $key => $val) {
            if ($val == '') {
                if (@$this->seats[$key-1] == '' && @$this->seats[$key+1] == '') {
                    return $key;
                }
            }
        }
        // Rule 2
        foreach ($this->seats as $key => $val) {
            if ($val == '') {
                if (@$this->seats[$key-1] == '' || @$this->seats[$key+1] == '') {
                    return $key;
                }
            }
        }
        // Rule 3
        foreach ($this->seats as $key => $val) {
            if ($val == '') {
                return $key;
            }
        }

        throw new \Exception('Can not find empty seat: ' . $str);
    }
}
