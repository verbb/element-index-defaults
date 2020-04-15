<?php
namespace verbb\elementindexdefaults\base;

use verbb\elementindexdefaults\ElementIndexDefaults;

use Craft;
use craft\log\FileTarget;

use yii\log\Logger;

use verbb\base\BaseHelper;

trait PluginTrait
{
    // Static Properties
    // =========================================================================

    public static $plugin;


    // Public Methods
    // =========================================================================

    public static function log($message, $attributes = [])
    {
        if ($attributes) {
            $message = Craft::t('element-index-defaults', $message, $attributes);
        }

        Craft::getLogger()->log($message, Logger::LEVEL_INFO, 'element-index-defaults');
    }

    public static function error($message, $attributes = [])
    {
        if ($attributes) {
            $message = Craft::t('element-index-defaults', $message, $attributes);
        }

        Craft::getLogger()->log($message, Logger::LEVEL_ERROR, 'element-index-defaults');
    }


    // Private Methods
    // =========================================================================

    private function _setPluginComponents()
    {
        $this->setComponents([

        ]);

        BaseHelper::registerModule();
    }

    private function _setLogging()
    {
        BaseHelper::setFileLogging('element-index-defaults');
    }

}