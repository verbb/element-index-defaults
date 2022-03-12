<?php
namespace verbb\elementindexdefaults\controllers;

use verbb\elementindexdefaults\ElementIndexDefaults;
use verbb\elementindexdefaults\models\Settings;

use craft\web\Controller;

use yii\web\Response;

class BaseController extends Controller
{
    // Public Methods
    // =========================================================================

    public function actionSettings(): Response
    {
        /* @var Settings $settings */
        $settings = ElementIndexDefaults::$plugin->getSettings();

        return $this->renderTemplate('element-index-defaults/settings', [
            'settings' => $settings,
        ]);
    }

}