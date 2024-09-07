<?php namespace Webpage\Cookies;

use System\Classes\PluginBase;
use Webpage\Cookies\Components\CookiesBar;
use Webpage\Cookies\Models\CookieSetting;
use Webpage\Cookies\Models\GDPR;
use Webpage\Cookies\Components\GDPRText;

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
                'label' => 'webpage.cookies::lang.plugin.settings.cookies_settings_title',
                'description' => 'webpage.cookies::lang.plugin.settings.cookies_settings_description',
                'category' => 'Cookies',
                'order' => 300,
                'icon' => 'icon-laptop',
                'permissions' => ['gdpr.cookies.manage_cookies'],
                'class' => CookieSetting::class,
            ],

            'gdpr.text' => [
                'label' => 'webpage.cookies::lang.plugin.settings.cookies_text_title',
                'description' => 'webpage.cookies::lang.plugin.settings.cookies_text_content',
                'category' => 'Cookies',
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
                'label' => 'webpage.cookies::lang.plugin.permissions.label',
                'tab' => 'GDPR',
            ]
        ];
    }
}
