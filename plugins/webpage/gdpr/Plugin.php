<?php namespace Webpage\GDPR;

use System\Classes\PluginBase;
use Webpage\GDPR\Components\CookiesBar;
use Webpage\GDPR\Models\CookieSetting;
use Webpage\GDPR\Models\GDPR;
use Webpage\GDPR\Components\GDPRText;

class Plugin extends PluginBase
{
    public function registerComponents(): array
    {
        return [
            CookiesBar::class => 'cookiesBar',
            GDPRText::class => 'gdpr'
        ];
    }

    public function registerSettings(): array
    {
        return [
            'gdpr.cookies' => [
                'label' => 'webpage.gdpr::lang.plugin.settings.cookies_settings_title',
                'description' => 'webpage.gdpr::lang.plugin.settings.cookies_settings_description',
                'category' => 'GDPR',
                'order' => 300,
                'icon' => 'icon-laptop',
                'permissions' => ['gdpr.cookies.manage_cookies'],
                'class' => CookieSetting::class,
            ],

            'gdpr.text' => [
                'label' => 'webpage.gdpr::lang.plugin.settings.cookies_text_title',
                'description' => 'webpage.gdpr::lang.plugin.settings.cookies_text_content',
                'category' => 'GDPR',
                'order' => 310,
                'icon' => 'icon-list-alt',
                'permissions' => ['gdpr.cookies.manage_cookies'],
                'class' => GDPR::class,
            ]
        ];
    }

    public function registerPermissions(): array
    {
        return [
            'gdpr.cookies.manage_cookies' => [
                'label' => 'webpage.gdpr::lang.plugin.permissions.label',
                'tab' => 'GDPR',
            ]
        ];
    }
}
