<?php namespace Webpage\Twig;

use File;
use Cms\Classes\Theme;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerMarkupTags(): array
    {
        
        return [
            'filters' => [
                'svg' => function($path) {
                    $theme = Theme::getActiveTheme();
                    $themeName = $theme->getDirName();
                    $fullPath = "themes/{$themeName}/{$path}";

                    $svgFile = File::get(base_path($fullPath));
                    return $svgFile;
                }
            ],
        ];
    }
}
