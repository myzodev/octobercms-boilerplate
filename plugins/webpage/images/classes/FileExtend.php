<?php namespace Webpage\Images\Classes;

use System\Models\File;

class FileExtend extends File
{
    public function getThumbFilename($width, $height, $options)
    {
        $options = $this->getDefaultThumbOptions($options);
        $file = pathinfo(str_replace(' ', '_', $this->file_name));
        $fileName = $file['filename'];
        $fileExtension  = $options['extension'];

        return $fileName.'_'.$width.'_'.$height.'_'.$this->id.'.'.$fileExtension;
    }
}
