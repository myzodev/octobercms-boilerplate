<?php namespace Webpage\Helpers\Classes\Helpers;

use Cms\Classes\ComponentBase;

abstract class BaseComponent extends ComponentBase
{
    // Set variable for both PHP file and page
    protected function setVariable($name, $value)
    {
        return $this->$name = $this->page[$name] = $value;
    }

    // Set variable for only page
    protected function setPageVariable($name, $value)
    {
        return $this->page[$name] = $value;
    }
}