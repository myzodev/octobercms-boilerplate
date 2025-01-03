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
        $this->addJs('/plugins/webpage/cookies/assets/js/cookies-bar.js');
        $this->addCss('/plugins/webpage/cookies/assets/css/cookies-bar.css');
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
        $consent = $cookies['consent'] ?? '';

        array_pop($cookies); // Remove consent from array (array_pop since consent is always last)

        switch ($consent) {
            case 'allow-all':
                $cookies = CookieSetting::getCookies();
                break;
            case 'deny-all':
                $cookies = CookieSetting::getRequiredCookies();
                break;
            case 'allow-selection':
                $cookies = CookieSetting::getSelectedCookies($cookies);
                break;
            default:
                $cookies = CookieSetting::getRequiredCookies();
                break;
        }

        CookieSetting::setCookies($cookies);

        $this->setVariable('acceptedCookies', CookieSetting::getSelectedCookies($cookies));
    }
}
