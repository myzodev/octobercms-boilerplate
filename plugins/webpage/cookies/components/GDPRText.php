<?php

namespace Webpage\Cookies\Components;

use Webpage\Cookies\Models\GDPR;
use Webpage\Helpers\Classes\Helpers\BaseComponent;

class GDPRText extends BaseComponent
{
    public function componentDetails(): array
    {
        return [
            'name' => 'webpage.cookies::lang.plugin.name',
            'description' => 'webpage.cookies::lang.plugin.name'
        ];
    }

    public function onRun(): void
    {
        $this->setPageVariable('gdpr', GDPR::instance()->value);
    }
}
