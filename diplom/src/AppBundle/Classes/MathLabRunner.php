<?php

namespace AppBundle\Classes;

class MathLabRunner
{
    const PATH_TO_M_FILE = 'C:\Soft\MATLAB-Copy\R2016b\bin';
    const M_FILE = 'RBF_22per.m';


    private function changeDir()
    {
        return exec('cd ' . self::PATH_TO_M_FILE);
    }

    public function generateCommandString()
    {
        $this->changeDir();
        return "cmd /K C:\Soft\MATLAB-Copy\R2016b\bin\matlab.exe -r -nosplash -nojvm -nodesktop -nodisplay " . "\"run('" . self::PATH_TO_M_FILE . '\\' . self::M_FILE . "')\"" ;
    }

    public function execute()
    {
        exec($this->generateCommandString());
    }
}
