<?php

namespace AppBundle\Classes;

use AppBundle\Exceptions\EmptyContentException;
use AppBundle\Interfaces\Writable;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

class FileWriter implements Writable
{
    private $path;

    public function __construct($path)
    {
        if (!file_exists($path)) {
            throw new FileNotFoundException("File not found in path: $path");
        }

        $this->path = $path;
    }

    public function write($content)
    {
        if (strlen($content) <= 0) {
            throw new EmptyContentException();
        }


        file_put_contents($this->path, $content);

        return $this->path;
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