<?php

declare(strict_types=1);

namespace Webpage\Images\Classes;

use Str, Cache;
use Webpage\Images\Models\Image;
use Webpage\Images\Classes\FileExtend as FileModel;

class ImageThumb
{
    public function getImageThumb($remoteUrl, $settings)
    {
        if (!$settings) {
            return;
        }

        $remoteUrlHostOut = parse_url($remoteUrl, PHP_URL_PATH);

        if (!Cache::has('thumb-' . $remoteUrlHostOut . '-' . $settings['width'] . '-' . $settings['height'] . '-' . $settings['mode']['extension'])) {
            // Check if thumb exist
            $localImage = Image::where('remote_url', $remoteUrlHostOut)->where('width', $settings['width'])->where('height', $settings['height'])->where('ext', $settings['mode']['extension'])->first();

            // If image exist, get thumb and webp
            if ($localImage) {
                Cache::forever('thumb-' . $remoteUrlHostOut . '-' . $settings['width'] . '-' . $settings['height'] . '-' . $settings['mode']['extension'], $localImage->thumb_url);

                return $localImage->thumb_url;
            }

            $fileName = str_replace('%20', '_', basename($remoteUrl));

            // Make temp file for thumb and save it
            $image = (new FileModel())->fromUrl($remoteUrl, $fileName);

            // Make thumb file and save it
            $image_thumb = $image->getThumb($settings['width'], $settings['height'], $settings['mode']);

            // Save image thumb info
            $imageModel = new Image();
            $imageModel->remote_url = $remoteUrlHostOut;
            $imageModel->local_file = strtok(parse_url($image->path, PHP_URL_PATH), '&');
            $imageModel->thumb_url = strtok(parse_url($image_thumb, PHP_URL_PATH), '&');
            $imageModel->width = $settings['width'];
            $imageModel->height = $settings['height'];
            $imageModel->ext = $settings['mode']['extension'];
            $imageModel->save();

            // Remove temp file
            unlink($_SERVER['DOCUMENT_ROOT'] . parse_url($image->path, PHP_URL_PATH));

            Cache::forever('thumb-' . $remoteUrlHostOut . '-' . $settings['width'] . '-' . $settings['height'] . '-' . $settings['mode']['extension'], $image_thumb);

            return $image_thumb;
        } else {
            return Cache::get('thumb-' . $remoteUrlHostOut . '-' . $settings['width'] . '-' . $settings['height'] . '-' . $settings['mode']['extension']);
        }
    }

    public function getExternalImageThumb($remoteUrl, $settings)
    {
        if (!$settings) {
            return;
        }

        $remoteUrlHostOut = $remoteUrl;

        if (!Cache::has('thumb-' . $remoteUrlHostOut . '-' . $settings['width'] . '-' . $settings['height'] . '-' . $settings['mode']['extension'])) {
            // Check if thumb exist
            $localImage = Image::where('remote_url', $remoteUrlHostOut)->where('width', $settings['width'])->where('height', $settings['height'])->where('ext', $settings['mode']['extension'])->first();

            // If image exist, get thumb and webp
            if ($localImage) {
                Cache::forever('thumb-' . $remoteUrlHostOut . '-' . $settings['width'] . '-' . $settings['height'] . '-' . $settings['mode']['extension'], $localImage->thumb_url);

                return $localImage->thumb_url;
            }

            // Make temp file for thumb and save it
            $image = (new FileModel())->fromUrl($remoteUrl, Str::uuid() . '.' . $settings['mode']['extension']);

            // Make thumb file and save it
            $image_thumb = $image->getThumb($settings['width'], $settings['height'], $settings['mode']);

            // Save image thumb info
            $imageModel = new Image();
            $imageModel->remote_url = $remoteUrlHostOut;
            $imageModel->local_file = strtok(parse_url($image->path, PHP_URL_PATH), '&');
            $imageModel->thumb_url = strtok(parse_url($image_thumb, PHP_URL_PATH), '&');
            $imageModel->width = $settings['width'];
            $imageModel->height = $settings['height'];
            $imageModel->ext = $settings['mode']['extension'];
            $imageModel->save();

            // Remove temp file
            unlink($_SERVER['DOCUMENT_ROOT'] . parse_url($image->path, PHP_URL_PATH));

            Cache::forever('thumb-' . $remoteUrlHostOut . '-' . $settings['width'] . '-' . $settings['height'] . '-' . $settings['mode']['extension'], strtok(parse_url($image_thumb, PHP_URL_PATH), '&'));

            return strtok(parse_url($image_thumb, PHP_URL_PATH), '&');
        } else {
            return Cache::get('thumb-' . $remoteUrlHostOut . '-' . $settings['width'] . '-' . $settings['height'] . '-' . $settings['mode']['extension']);
        }
    }

    public function deleteAllThumbs()
    {
        $images = Image::get();

        foreach ($images as $image) {
            // Remove temp file
            if (file_exists(base_path() . parse_url($image->local_file, PHP_URL_PATH))) {
                unlink(base_path() . parse_url($image->local_file, PHP_URL_PATH));
            }

            // Remove basic thumb
            if (file_exists(base_path() . parse_url($image->thumb_url, PHP_URL_PATH))) {
                unlink(base_path() . parse_url($image->thumb_url, PHP_URL_PATH));
            }

            // Remove webp thumb
            if ($image->webp_url) {
                if (file_exists(base_path() . parse_url($image->webp_url, PHP_URL_PATH))) {
                    unlink(base_path() . parse_url($image->webp_url, PHP_URL_PATH));
                }
            }

            // Delete model
            $image->delete();
        }
    }
}
