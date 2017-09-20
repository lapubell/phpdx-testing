<?php

namespace phpdx;

include "../vendor/autoload.php";
include "Validator.php";

use PHPUnit\Framework\TestCase;

class ValidatorText extends TestCase
{
    /** @test */
    function fname_is_required_for_vaildation()
    {
        $array = [
            "fname" => "kurtis",
            "lname" => "holsapple",
        ];

        $validator = new Validator;
        $result = $validator->validate($array);

        $this->assertTrue($result);
    }
}
