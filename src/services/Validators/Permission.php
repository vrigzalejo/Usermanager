<?php namespace Vrigzalejo\Usermanager\Services\Validators;

use Config;

class Permission extends \Vrigzalejo\Usermanager\Services\Validators\Validator
{
    public function __construct($data = null, $level = null)
    {
        parent::__construct($data, $level);

        static::$rules = Config::get('usermanager::validator.permission');
    }
}
