<?php namespace Webpage\Helpers;

use System\Classes\PluginBase;
use Webpage\Helpers\Classes\Helpers\ContactInformationValidator;
use Webpage\Helpers\Classes\Helpers\DeviceValidator;

class Plugin extends PluginBase
{
    public function registerMarkupTags()
    {
        return [
            'filters' => [
                'tel' => [ContactInformationValidator::class, 'generatePhoneNumberLink'],
                'mailto' => [ContactInformationValidator::class, 'generateEmailLink'],
            ],
            'functions' => [
                'isMobileDevice' => [DeviceValidator::class, 'isMobile']
            ]
        ];
    }
}
