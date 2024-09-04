<?php namespace Webpage\Frontend\Components;

use Site;
use Webpage\Frontend\Models\Setting;
use Webpage\Helpers\Classes\Helpers\BaseComponent;

class SettingsData extends BaseComponent
{
    public $record = null;

    public function componentDetails(): array
    {
        return [
            'name' => 'Frontend Settings',
            'description' => 'Get all Frontend settings.'
        ];
    }

    public function onRun(): void
    {
        $this->setVariable('record', $this->loadSettings());
    }
    
    protected function loadSettings(): ?Setting
    {
        $siteID = Site::getSiteFromContext()->id;
        $settings = Setting::where('site_id', $siteID)->first();

        return $settings;
    }
}
