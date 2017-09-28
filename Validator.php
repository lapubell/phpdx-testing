<?php

namespace phpdx;

class Validator
{
    protected $rules;
    protected $required_fields = [];

    /**
     * set the rules needed for successful validation. you can't run the validate method until the rules are set
     * @param array $rules multidimentional array of properties and their rules
     */
    public function setRules(array $rules)
    {
        $this->rules = $rules;
        return $this->checkRules();
    }

    private function checkRules()
    {
        $status = true;
        foreach ($this->rules as $prop => $rule) {
            if (!method_exists($this, $rule)) {
                $status = false;
            }

            if ($rule == "required") {
                $this->required_fields[] = $prop;
            }
        }
        return $status;
    }

    /**
     * check for a value
     * @param  string $str the string to check
     * @return bool      if the string length of the variable is shorter than 1, false, otherwise true
     */
    private function required($str)
    {
        if (strlen($str) < 1) {
            return false;
        }
        return true;
    }

    private function isEmail($str)
    {
        return filter_var($str, FILTER_VALIDATE_EMAIL);
    }

    /**
     * the real magic. check each item in $data against any of it's rules
     * @param  array  $data data that needs to be checked
     * @return boolean       wether or not the validation passed
     */
    public function validate(array $data)
    {
        // if rules aren't set, return early
        if (!is_array($this->rules)) {
            return false;
        }

        // if rules aren't calid, return early
        if ($this->checkRules() == false) {
            return false;
        }

        // check $data for all required fields
        foreach ($this->required_fields as $key) {
            if (!in_array($key, array_keys($data))) {
                return false;
            }
        }

        $status = true;
        foreach ($data as $prop => $value) {
            // if we don't have any rules for this property, continue as is
            if (!isset($this->rules[$prop])) {
                continue;
            }

            // run each rule for each property
            $status = call_user_func([$this, $this->rules[$prop]], $value);
        }

        return $status;
    }
}
