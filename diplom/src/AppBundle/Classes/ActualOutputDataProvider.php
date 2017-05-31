<?php

namespace AppBundle\Classes;

use AppBundle\Interfaces\Outputable;

class ActualOutputDataProvider implements Outputable
{
    const OUTPUT_X = 'output1.txt';
    const OUTPUT_Y = 'output2.txt';
    const OUTPUT_Z = 'outputT.txt';

    /**
     * @return array
     */
    public static function getFileNames()
    {
        return [
          self::OUTPUT_X,
          self::OUTPUT_Y,
          self::OUTPUT_Z,
        ];
    }
}