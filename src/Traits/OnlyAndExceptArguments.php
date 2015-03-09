<?php namespace Daavelar\RevengeDb\Traits;

trait OnlyAndExceptArguments {

    /**
     * @return bool
     */
    protected function passedOnlyAndExcept()
    {
        return ($this->passedOnly() && $this->passedExcept());
    }

    /**
     * @return bool
     */
    protected function passedOnly()
    {
        return !is_null($this->option('only'));
    }

    /**
     * @return bool
     */
    protected function passedExcept()
    {
        return !is_null($this->option('except'));
    }

    protected function commaParse($string)
    {
        $string = str_replace(' ', '', $string);

        return explode(',', $string);
    }
} 