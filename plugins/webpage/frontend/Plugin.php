<?php namespace Webpage\Frontend;

use System\Classes\PluginBase;
use Webpage\Frontend\Components\SettingsData;

class Plugin extends PluginBase
{
    public function registerComponents(): array
    {
        return [
            SettingsData::class => 'webpageSettings'
        ];
    }

    public function registerPermissions(): array
    {
        return [
            'frontend.settings.manage_settings' => [
                'label' => 'webpage.frontend::lang.plugin.permissions.label',
                'tab' => 'webpage.frontend::lang.plugin.name',
            ]
        ];
    }
}
