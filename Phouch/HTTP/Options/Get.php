<?php

namespace Phouch\HTTP\Options;

class Get extends OptionsAbstract
{
    public function __construct()
    {
        $this->_method = 'GET';
        parent::__construct(func_get_args());
    }
}
