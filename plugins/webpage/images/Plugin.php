<?php namespace Webpage\Images;

use Storage;
use System\Classes\PluginBase;
use Webpage\Images\Classes\ImageThumb;
use Media\Classes\MediaLibrary;

class Plugin extends PluginBase
{
    public function registerMarkupTags()
    {
        return [
            'filters' => [
                'makeThumb' => [$this, 'makeThumb'],
            ],
        ];
    }

    public function makeThumb($link, $width, $height, $type, $mode = 'auto', $quality = 90)
    {
        $settings = ['width' => $width, 'height' => $height, 'mode' => ['quality' => $quality , 'extension' => $type, 'mode' => $mode]];

        if (Storage::exists('media/' . $link)) {
            $image = (new ImageThumb)->getImageThumb(MediaLibrary::url($link), $settings);

            return $image;
        } else {
            $image = (new ImageThumb)->getExternalImageThumb($link, $settings);

            return $image;
        }
    }
}
