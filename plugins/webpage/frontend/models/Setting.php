<?php namespace Webpage\Frontend\Models;

use Model;
use Webpage\Frontend\Classes\SettingsCache;

class Setting extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Webpage\Helpers\Classes\Traits\HasMultisite;

    public $timestamps = false;

    public $table = 'webpage_frontend_settings';

    public $fillable = [
        'logo',
        'favicon',
        'menu',
    ];

    public $nullable = [
        'logo',
        'favicon',
        'menu',
    ];

    public $jsonable = [
        'menu', 
        'contact_information',
        'social_media'
    ];

    public $rules = [];

    public function afterSave() {
        SettingsCache::setSettingsCache();
    }
}
