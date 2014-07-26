<?php

namespace Phouch\Exception\Document\Value;

class NotExists extends \Phouch\Exception\ExceptionAbstract
{
    public function __construct()
    {
        $message = 'Document value does not exist.';
        parent::__construct($message);
    }
}