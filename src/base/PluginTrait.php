<?php
namespace verbb\elementindexdefaults\base;

use verbb\elementindexdefaults\ElementIndexDefaults;
use verbb\base\BaseHelper;

use Craft;

use yii\log\Logger;

trait PluginTrait
{
    // Properties
    // =========================================================================

    public static ElementIndexDefaults $plugin;


    // Public Methods
    // =========================================================================

    public static function log(string $message, array $params = []): void
    {
        $message = Craft::t('element-index-defaults', $message, $params);

        Craft::getLogger()->log($message, Logger::LEVEL_INFO, 'element-index-defaults');
    }

    public static function error(string $message, array $params = []): void
    {
        $message = Craft::t('element-index-defaults', $message, $params);

        Craft::getLogger()->log($message, Logger::LEVEL_ERROR, 'element-index-defaults');
    }


    // Private Methods
    // =========================================================================

    private function _registerComponents(): void
    {
        $this->setComponents([

        ]);

        BaseHelper::registerModule();
    }

    private function _registerLogTarget(): void
    {
        BaseHelper::setFileLogging('element-index-defaults');
    }

}