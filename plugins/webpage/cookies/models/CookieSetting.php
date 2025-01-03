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

    private const COOKIE_PREFIX = 'cookies-';

    public static function getCookies(): array
    {
        $cookies = [];
        $cookiesData = self::get('cookies'); // Get cookies from SettingModel 

        if (empty($cookiesData)) return [];

        foreach ($cookiesData as $cookie) {
            $cookies[$cookie['cookie_slug']] = $cookie;
        }

        return $cookies;
    }

    public static function getRequiredCookies(): array
    {
        $requiredCookies = [];
        $cookiesData = self::getCookies();

        if (empty($cookiesData)) return [];

        foreach ($cookiesData as $cookie) {
            if (!$cookie['is_required']) continue;
            $requiredCookies[$cookie['cookie_slug']] = $cookie;
        }

        return $requiredCookies;
    }

    public static function getSelectedCookies($selectedCookies): array
    {
        if (empty($selectedCookies)) return [];

        $matchingCookies = [];
        $cookiesData = self::getCookies();

        foreach ($selectedCookies as $selectedCookie => $value) {
            if (!isset($cookiesData[$selectedCookie])) continue;
            $matchingCookies[$selectedCookie] = $cookiesData[$selectedCookie];
        }

        return $matchingCookies;
    }

    public static function getAcceptedCookies(): array
    {
        $acceptedCookies = [];
        $cookiesData = self::getCookies();

        foreach ($_COOKIE as $cookie => $value) {
            if (strpos($cookie, self::COOKIE_PREFIX) !== 0) continue;

            $cookieSlug = substr($cookie, strlen(self::COOKIE_PREFIX));

            if (!isset($cookiesData[$cookieSlug])) continue;

            $acceptedCookies[$cookieSlug] = $cookiesData[$cookieSlug];
        }

        return $acceptedCookies;
    }

    public static function getCookiesConsent(): bool
    {
        foreach (self::getCookies() as $cookie) {
            $cookieKey = self::COOKIE_PREFIX . $cookie['cookie_slug'];
            if ($cookie['is_required'] && empty($_COOKIE[$cookieKey])) return false;
        }

        foreach ($_COOKIE as $cookie => $value) {
            if (strpos($cookie, self::COOKIE_PREFIX) === 0) return true;
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
