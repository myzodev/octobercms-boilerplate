<?php namespace Webpage\Cookies\Models;

use Carbon\Carbon;
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

    public static function getCookies(): array
    {
        $cookies = [];

        foreach (CookieSetting::get('cookies') as $cookie) {
            $cookies[$cookie['cookie_slug']] = $cookie;
        }

        return $cookies;
    }

    public static function getRequiredCookies(): array
    {
        $cookies = [];

        foreach (CookieSetting::get('cookies') as $cookie) {
            if ($cookie['is_required']) {
                $cookies[$cookie['cookie_slug']] = $cookie;
            }
        }

        return $cookies;
    }

    public static function getSelectedCookies($selectedCookies): array
    {
        $cookies = [];
        $instanceCookies = CookieSetting::get('cookies');

        foreach ($selectedCookies as $selectedCookie => $value) {
            foreach ($instanceCookies as $instanceCookie) {
                if ($instanceCookie['cookie_slug'] === $selectedCookie) {
                    $cookies[$selectedCookie] = $instanceCookie;
                }
            }
        }

        return $cookies;
    }

     public static function getAcceptedCookies(): array
    {
        $cookies = [];

        foreach ($_COOKIE as $cookie => $value) {
            // Check if the cookie key starts with 'cookies-'
            if (strpos($cookie, 'cookies-') !== 0) {
                continue;
            }

            $cookieSlug = substr($cookie, 8); // Get the slug part of the cookie key

            foreach (CookieSetting::get('cookies') as $cookie) {
                if($cookie['cookie_slug'] === $cookieSlug) {
                    $cookies[$cookie['cookie_slug']] = $cookie;
                }
            }
        }

        return $cookies;
    }

    public static function getCookiesConsent(): bool
    {
        foreach (CookieSetting::get('cookies', []) as $cookie) {
            $currentCookieSlug = 'cookies-' . $cookie['cookie_slug'];
            $currentCookiesIsRequired = $cookie['is_required'];

            // Check if any required cookie is missing
            if ($currentCookiesIsRequired && empty($_COOKIE[$currentCookieSlug])) {
                return false; // Consent not given if a required cookie is missing
            }
        }

        foreach ($_COOKIE as $cookie => $cookieValue) {
            if (strpos($cookie, 'cookies-') === 0) {
                return true; // At least one cookie starts with the prefix
            }
        }

        return false;
    }

    public static function setCookies($cookies = []): void
    {
        $path = '/';
        $domain = $_SERVER['SERVER_NAME'];
        $expires = Carbon::now()->addDays(CookieSetting::get('cookies_expiration_days'))->timestamp;

        foreach ($cookies as $cookie) {
            $cookieName = "cookies-{$cookie['cookie_slug']}";
            setcookie($cookieName, 'on', $expires, $path, $domain, true, true);
        }
    }
}
