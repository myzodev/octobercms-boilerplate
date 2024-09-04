<?php namespace Webpage\Helpers\Classes\Traits;

trait HasMultisite
{
    use \October\Rain\Database\Traits\Multisite;

    public $propagatable = [];

    public function isMultisiteEnabled()
    {
        return $this->multisiteScopeEnabled && !app()->runningInConsole();
    }
}
