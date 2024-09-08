<?php namespace Webpage\Cookies\Components;

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
        // dd($this->cookiesConsent);
        $path = "/plugins/webpage/cookies/assets/js/cookie-bar.js";
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
            $cookies = CookieSetting::getRequiredCookies();
        }

        // Allow selection and check if any cookies have been accepted
        if($consent === 'allow-selection') {
            $cookies = CookieSetting::getSelectedCookies($cookies);
        }

        if(empty($cookies)) {
            $cookies = CookieSetting::getRequiredCookies();
        }

        CookieSetting::setCookies($cookies);
        
        $this->setVariable('acceptedCookies', CookieSetting::getSelectedCookies($cookies));
    }
}
