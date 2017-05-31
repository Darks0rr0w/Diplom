<?php

namespace AppBundle\Classes;

use AppBundle\Interfaces\Outputable;

class ApproxOutputDataProvider implements Outputable
{
    const OUTPUT_X = 'output1.txt';
    const OUTPUT_Y = 'output2.txt';
    const OUTPUT_Z = 'outputY.txt';

    public static function getFileNames()
    {
        return [
            self::OUTPUT_X,
            self::OUTPUT_Y,
            self::OUTPUT_Z
        ];
    }
}