<?php namespace Webpage\Frontend\Components;

use Webpage\Frontend\Classes\SettingsCache;
use Webpage\Helpers\Classes\Helpers\BaseComponent;

class SettingsData extends BaseComponent
{
    public $record = null;

    public function componentDetails()
    {
        return [
            'name' => 'Frontend Settings',
            'description' => 'Get all Frontend settings.'
        ];
    }

    public function onRun()
    {
        $this->setVariable('record', SettingsCache::getSettingsCache());
    }
}
