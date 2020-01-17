<?php
namespace verbb\elementindexdefaults\base;

use verbb\elementindexdefaults\ElementIndexDefaults;

use Craft;
use craft\log\FileTarget;

use yii\log\Logger;

trait PluginTrait
{
    // Static Properties
    // =========================================================================

    public static $plugin;


    // Public Methods
    // =========================================================================

    private function _setPluginComponents()
    {
        $this->setComponents([

        ]);
    }

    private function _setLogging()
    {
        Craft::getLogger()->dispatcher->targets[] = new FileTarget([
            'logFile' => Craft::getAlias('@storage/logs/element-index-defaults.log'),
            'categories' => ['element-index-defaults'],
        ]);
    }

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

}