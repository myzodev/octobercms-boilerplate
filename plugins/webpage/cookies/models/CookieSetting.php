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

    const COOKIE_PREFIX = 'cookies-';

    public static function getCookies(): array
    {
        $cookies = [];

        if (self::get('cookies')) {
            foreach (self::get('cookies') as $cookie) {
                $cookies[$cookie['cookie_slug']] = $cookie;
            }
        }

        return $cookies;
    }

    public static function getRequiredCookies(): array
    {
        $requiredCookies = [];

        foreach (self::getCookies() as $cookie) {
            if ($cookie['is_required']) {
                $requiredCookies[$cookie['cookie_slug']] = $cookie;
            }
        }

        return $requiredCookies;
    }

    public static function getSelectedCookies($selectedCookies): array
    {
        $cookies = self::getCookies();
        $matchingCookies = [];

        foreach ($selectedCookies as $selectedCookie => $value) {
            if (isset($cookies[$selectedCookie])) {
                $matchingCookies[$selectedCookie] = $cookies[$selectedCookie];
            }
        }

        return $matchingCookies;
    }

    public static function getAcceptedCookies(): array
    {
        $acceptedCookies = [];

        foreach ($_COOKIE as $cookie => $value) {
            if (strpos($cookie, self::COOKIE_PREFIX) === 0) {
                $cookieSlug = substr($cookie, strlen(self::COOKIE_PREFIX));

                if (isset(self::getCookies()[$cookieSlug])) {
                    $acceptedCookies[$cookieSlug] = self::getCookies()[$cookieSlug];
                }
            }
        }

        return $acceptedCookies;
    }

    public static function getCookiesConsent(): bool
    {
        foreach (self::getCookies() as $cookie) {
            $cookieKey = self::COOKIE_PREFIX . $cookie['cookie_slug'];

            if ($cookie['is_required'] && empty($_COOKIE[$cookieKey])) {
                return false;
            }
        }

        foreach ($_COOKIE as $cookie => $value) {
            if (strpos($cookie, self::COOKIE_PREFIX) === 0) {
                return true;
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
            $cookieName = self::COOKIE_PREFIX . $cookie['cookie_slug'];
            setcookie($cookieName, 'on', $expires, $path, $domain, true, true);
        }
    }
}
