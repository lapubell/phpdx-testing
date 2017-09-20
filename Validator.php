<?php

namespace phpdx;

class Validator
{
    public function validate(array $array)
    {
        return (isset($array['fname']));
    }
}
