<?php namespace Vrigzalejo\Usermanager\Services\Validators;

use Config;

abstract class Validator
{
    protected $attributes;

    protected $errors;

    protected $level;

    public static $rules = array();

    public function __construct($data = null, $level = null)
    {
        $this->attributes = $data ?: \Input::all();
        $this->level = $level;
    }

    public function passes()
    {
        $rules = array();
        if($this->level !== null) {
            $rules = static::$rules[$this->level];
        } else {
            $rules = static::$rules;

        }

        $loginAttribute = Config::get('cartalyst/sentry::users.login_attribute');
        if($loginAttribute === 'email') {
            unset($rules['username']);
        } elseif($loginAttribute === 'username') {
            unset($rules['email']);
        }

        $messages = array();
        if(is_array(trans('usermanager::validation'))) {
            $messages = trans('usermanager::validation');
        }

        $validation = \Validator::make($this->attributes, $rules, $messages);

        if($validation->passes()) {
            return true;
        }

        $this->errors = $validation->messages()->getMessages();

        return false;
    }

    public function getErrors()
    {
        return $this->errors;
    }

}
