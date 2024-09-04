<?php namespace Webpage\Frontend\Models;

use Model;

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
}
