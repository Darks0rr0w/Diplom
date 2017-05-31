<?php

namespace AppBundle\Classes;

use AppBundle\Interfaces\Readable;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

class FileReader implements Readable
{
    private $path;

    public function __construct($path)
    {
        if (!file_exists($path)) {
            throw new FileNotFoundException("File not found in path: $path");
        }
        $this->path = $path;
    }

    /**
     * @return bool|string
     */
    public function read()
    {
        return file_get_contents($this->path);
    }



    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }
}