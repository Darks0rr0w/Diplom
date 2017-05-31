<?php

namespace AppBundle\Classes;

class FileParser
{


    public function saveFilesToMathLab($fileContent)
    {
        $contentArray = explode('|', $fileContent);

        foreach ($contentArray as $key =>  $item) {
            $this->writeToFile($key, $item);
        }

    }

    private function writeToFile($fileNumber, $content)
    {
        $fileName = 'input' . (int) ($fileNumber + 1) . '.txt';
        $fullPath = MathLabRunner::PATH_TO_M_FILE . '\\' . $fileName;
        if (file_exists($fullPath)) {
            file_put_contents($fullPath, $content);
        } else {
            $file = fopen($fullPath, 'w');
            fwrite($file, $content);
            fclose($file);
        }
    }
}