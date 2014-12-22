<?php namespace Vrigzalejo\Usermanager\Services\Validators;

use Config;

class Group extends \Vrigzalejo\Usermanager\Services\Validators\Validator
{
    public function __construct($data = null, $level = null)
    {
        parent::__construct($data, $level);

        static::$rules = Config::get('usermanager::validator.group');
    }
}
