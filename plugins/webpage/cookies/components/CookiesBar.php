<?php namespace Webpage\Cookies\Components;

use Carbon\Carbon;
use Webpage\Cookies\Models\CookieSetting;
use Webpage\Helpers\Classes\Helpers\BaseComponent;

class CookiesBar extends BaseComponent
{
    public $settings;
    public $cookiesConsent;
    public $acceptedCookies;

    public function init(): void
    {
        $this->setVariable('settings', CookieSetting::instance()->value);
        $this->setVariable('cookiesConsent', CookieSetting::getCookiesConsent());
        $this->setVariable('acceptedCookies', CookieSetting::getAcceptedCookies());
    }

    public function onRun(): void
    {
        $path = "/plugins/webpage/gdpr/assets/js/cookie-bar.js";
        $this->addJs($path, ['defer' => true]);
    }

    public function componentDetails(): array
    {
        return [
            'name' => 'Cookies Bar',
            'description' => 'Display cookies bar.'
        ];
    }

    protected function onConsent(): void
    {
        $cookies = post(); // Accepted cookies from user
        $consent = $cookies['consent'];

        array_pop($cookies); // Remove consent (array_pop since consent is always last)

        // Allow all cookies
        if($consent === 'allow-all') {
            $cookies = CookieSetting::getCookies();
        }

        // Allow only required cookies
        if($consent === 'deny-all') {
            $cookies = CookieSetting::getCookies(true);
        }

        // Allow selection and check if any cookies have been accepted
        // if not set to required cookies
        if($consent === 'allow-selection' && (empty($cookies) || count($cookies) < 1)) {
            $cookies = CookieSetting::getCookies(true);
        }

        $this->setCookies($cookies);
    }
    
    protected function setCookies($cookies = []): void
    {
        $path = '/';
        $domain = $_SERVER['SERVER_NAME'];
        $expires = Carbon::now()->addDays($this->settings['cookies_expiration_days'])->timestamp;

        foreach ($cookies as $cookie => $value) {
            $sanitizedValue = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            
            if (!setcookie("cookies-{$cookie}", $sanitizedValue, $expires, $path, $domain, true, true)) {
                error_log("Failed to set cookie: cookies-{$cookie}");
            }
        }
    }
}
