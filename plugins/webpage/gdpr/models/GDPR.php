<?php namespace Webpage\GDPR\Models;

use System\Models\SettingModel;

class GDPR extends SettingModel
{
    use \October\Rain\Database\Traits\Multisite;
    use \October\Rain\Database\Traits\Validation;

    protected $propagatable = [];

    public $settingsCode = 'cookies_text';

    public $settingsFields = 'fields.yaml';

    public $rules = [
        'title' => 'required',
        'text' => 'required'
    ];
}
