<?php namespace Webpage\Images\Models;

use Model;

class Image extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'webpage_images_index';

    public $rules = [];
}
