<?php

namespace AppBundle\Exceptions;

class EmptyContentException extends \Exception
{
    protected $message = 'Content must be at least 1 character long';
}