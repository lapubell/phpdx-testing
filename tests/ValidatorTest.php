<?php

namespace phpdx;

include "Validator.php";

use PHPUnit\Framework\TestCase;

class ValidatorText extends TestCase
{
    /** @test */
    public function validatorNeedsRulesToBeSet()
    {
        $v = new Validator;
        $result = $v->validate([]);

        $this->assertFalse($result);
    }

    /** @test */
    public function requiredIsAValidRule()
    {
        $v = new Validator;
        $rules = [
            'foo' => 'required'
        ];

        $result = $v->setRules($rules);

        $this->assertTrue($result);
    }

    /** @test */
    public function requiredMeansItMustBeSetAndNotAnEmptyString()
    {
        $v = new Validator;
        $rules = [
            'foo' => 'required'
        ];
        $v->setRules($rules);

        // should fail validation, foo isn't set
        $data = [];
        $this->assertFalse($v->validate($data));

        // should fail, foo is an empty string
        $data = [
            'foo' => ''
        ];
        $this->assertFalse($v->validate($data));

        // should pass, foo is a string
        $data= [
            'foo' => 'bar'
        ];
        $this->assertTrue($v->validate($data));
    }
}
