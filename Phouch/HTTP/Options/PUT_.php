<?php

namespace Phouch\HTTP\Options;

class Put extends OptionsAbstract
{
    public function __construct()
    {
        $this->_method = 'PUT';
    }
}