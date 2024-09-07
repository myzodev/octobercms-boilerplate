<?php

namespace Webpage\Cookies\Models;

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

    static function getCookies(bool $requiredOnly = false): array
    {
        $cookies = [];

        foreach (CookieSetting::get('cookies', []) as $cookie) {
            if (!$requiredOnly || $cookie['is_required']) {
                $cookies[$cookie['cookie_slug']] = 1;
            }
        }

        return $cookies;
    }

    static function getAcceptedCookies(): array
    {
        $cookies = [];
        $instanceCookies = self::instance()->cookies;

        foreach ($_COOKIE as $key => $value) {
            // Check if the cookie key starts with 'cookies-'
            if (strpos($key, 'cookies-') !== 0) {
                continue;
            }

            $cookieSlug = substr($key, 8); // Get the slug part of the cookie key

            // Find the matching cookie in the instance cookies array
            foreach ($instanceCookies as $cookie) {
                if ($cookie['cookie_slug'] === $cookieSlug) {
                    $cookies[$key] = $cookie;
                    break;
                }
            }
        }

        return $cookies;
    }

    static function getCookiesConsent(): bool
    {
        foreach (CookieSetting::get('cookies', []) as $cookie) {
            $currentCookieSlug = 'cookies-' . $cookie['cookie_slug'];
            $currentCookiesIsRequired = $cookie['is_required'];

            // Check if the required cookie is missing
            if ($currentCookiesIsRequired && empty($_COOKIE[$currentCookieSlug])) {
                return false; // Consent not given if a required cookie is missing
            }
        }

        return true;
    }
}
