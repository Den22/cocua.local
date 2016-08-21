<?php

namespace Application\Validators;


abstract class AbstractValidator
{
    protected $Filters;
    protected $ErrorsMessage;
    public $disparity;
    public $inputs;


    public function checkForm()
    {
        $this->inputs = filter_input_array(INPUT_POST, $this->Filters);
        foreach ($this->inputs as $key => $input) {
            if (empty($input) || $input === false) {
                $this->disparity = $this->ErrorsMessage[$key];
                return true;
            }
        }
        return false;
    }
}