<?php namespace Webpage\GDPR\Models;

use System\Models\SettingModel;

class CookieSetting extends SettingModel
{
    use \October\Rain\Database\Traits\Multisite;
    use \October\Rain\Database\Traits\Validation;

    protected $propagatable = [];

    public $settingsCode = 'cookies_settings';

    public $settingsFields = 'fields.yaml';

    public $rules = [
        'cookie_bar_title' => 'required',
        'cookie_bar_description' => 'required'
    ];

    static function getCookies($cookiesPrefix = 'cookies'): array
    {
        $cookies = [];

        foreach (CookieSetting::get('cookies', []) as $cookie) {
            if (!empty($cookie['is_enabled']) and empty($_COOKIE[($cookiesPrefix . '-consent')])) {
                $cookies[$cookie['cookie_slug']] = 1;
                continue;
            }

            if (!empty($_COOKIE[($cookiesPrefix . '-' . $cookie['cookie_slug'])])) {
                $cookies[$cookie['cookie_slug']] = 1;
            }
        }

        return $cookies;
    }

    static function getRequiredCookies(): array
    {
        $requiredCookies = [];

        foreach (CookieSetting::get('cookies', []) as $cookie) {
            if ($cookie['is_required']) {
                $requiredCookies[$cookie['cookie_slug']] = 1;
            }
        }

        return $requiredCookies;
    }

    static function getCookiesConsent($cookiesPrefix = 'cookies'): string
    {
        return !empty($_COOKIE[($cookiesPrefix . '-consent')]);;
    }
}
