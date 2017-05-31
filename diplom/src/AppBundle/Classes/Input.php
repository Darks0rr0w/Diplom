<?php

namespace AppBundle\Classes;



class Input
{
    private $from;
    private $to;
    private $step;

    public function generateInputArray(FileWriter $fileWriter)
    {
        $content = '';
        for ($i = $this->from; $i < $this->to; $i = $i+$this->step)
        {
            $content .= $i . ' ';
        }

        return $fileWriter->write($content);
    }

}