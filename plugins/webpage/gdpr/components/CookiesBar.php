<?php namespace Webpage\GDPR\Components;

use Carbon\Carbon;
use Cms\Classes\Theme;
use Webpage\GDPR\Models\CookieSetting;
use Webpage\Helpers\Classes\Helpers\BaseComponent;

class CookiesBar extends BaseComponent
{
    public $settings;
    public $cookies;
    public $requiredCookies;
    public $cookiesConsent;

    public function init(): void
    {
        $this->setVariable('settings', CookieSetting::instance()->value);
        $this->setVariable('cookies', CookieSetting::getCookies());
        $this->setVariable('requiredCookies', CookieSetting::getRequiredCookies());
        $this->setVariable('cookiesConsent', CookieSetting::getCookiesConsent());
    }

    public function onRun(): void
    {
        $path = "/plugins/webpage/gdpr/assets/js/cookie-bar.js";
        $this->addJs($path, ['defer' => true]);
    }

    public function componentDetails(): array
    {
        return [
            'name' => 'webpage.gdpr::lang.components.cookie_bar_name',
            'description' => 'webpage.gdpr::lang.components.cookie_bar_description'
        ];
    }

    protected function onConsent(): void
    {
        $cookies = post() ? post() : $this->requiredCookies;
        $expires = Carbon::now()->addDays($this->settings['cookies_expiration_days'])->timestamp;

        if (!$this->cookiesConsent && !empty($this->requiredCookies)) {
            $this->setCookies($cookies, $expires);
        }
    }

    private function setCookies($cookies, $expires): void {
        setcookie('cookies-consent', 1, $expires);

        foreach ($cookies as $cookie => $value) {
            setcookie("cookies-{$cookie}", $value, $expires);
        }
    }
}
