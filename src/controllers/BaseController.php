<?php
namespace verbb\elementindexdefaults\controllers;

use verbb\elementindexdefaults\ElementIndexDefaults;

use craft\web\Controller;

use yii\web\Response;

class BaseController extends Controller
{
    // Public Methods
    // =========================================================================

    public function actionSettings(): Response
    {
        $settings = ElementIndexDefaults::$plugin->getSettings();

        return $this->renderTemplate('element-index-defaults/settings', array(
            'settings' => $settings,
        ));
    }

}