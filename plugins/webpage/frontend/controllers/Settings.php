<?php namespace Webpage\Frontend\Controllers;

use BackendMenu, Site;
use Backend\Behaviors\FormController\HasMultisite;
use Webpage\Frontend\Models\Setting;
use Backend\Classes\Controller;

class Settings extends Controller
{
    use HasMultisite;

    public $requiredPermissions = ['frontend.settings.manage_settings'];

    public $implement = [
        \Backend\Behaviors\FormController::class,
    ];

    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Webpage.Frontend', 'main-menu-frontend-settings');
    }

    public function index()
    {
        if ($redirect = $this->handleMultiSite()) {
            return $redirect;
        }

        $siteID = Site::getSiteFromContext()->id;
        $model = Setting::firstOrCreate([
            'site_id' => $siteID
        ]);

        $this->initForm($model);
        $this->pageTitle = 'webpage.frontend::lang.plugin.name';
    }

    public function onSave()
    {
        $siteID = Site::getSiteFromContext()->id;
        $modelID = Setting::where('site_id', $siteID)->first()->id;

        return $this->asExtension('FormController')->update_onSave($modelID);
    }

    public function onSwitchSite(): array
    {
        $result = [];

        $model = Setting::where('site_id', post('site_id'))->first();

        if(!$model) {
            $result['confirm'] = __('A record does not exist for the selected site. Create one?');
        }

        return $result;
    }

    private function handleMultiSite(): void
    {
        $this->addHandlerToSiteSwitcher();

        if (!get('_site_id') || request()?->ajax()) return;

        Setting::firstOrCreate([
            'site_id' => get('_site_id')
        ]);
    }
}