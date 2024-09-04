<?php namespace Webpage\GDPR\Components;

use Webpage\GDPR\Models\GDPR;
use Webpage\Helpers\Classes\Helpers\BaseComponent;

class GDPRText extends BaseComponent
{
    public function componentDetails(): array
    {
        return [
            'name' => 'webpage.gdpr::lang.plugin.name',
            'description' => 'webpage.gdpr::lang.plugin.name'
        ];
    }

    public function onRun(): void
    {
        $this->setPageVariable('gdpr', GDPR::instance()->value);
    }
}
