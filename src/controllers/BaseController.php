<?php
namespace verbb\elementindexdefaults\controllers;

use Craft;
use craft\base\Volume;
use craft\elements\Asset;
use craft\web\Controller;

use verbb\elementindexdefaults\ElementIndexDefaults;

class BaseController extends Controller
{
    // Public Methods
    // =========================================================================

    public function actionSettings()
    {
        $settings = ElementIndexDefaults::$plugin->getSettings();

        $this->renderTemplate('element-index-defaults/settings', array(
            'settings' => $settings,
        ));
    }

}