<?php
namespace verbb\elementindexdefaults;

use verbb\elementindexdefaults\base\PluginTrait;
use verbb\elementindexdefaults\models\Settings;

use Craft;
use craft\base\Element;
use craft\base\Model;
use craft\base\Plugin;
use craft\events\RegisterUrlRulesEvent;
use craft\events\RegisterElementDefaultTableAttributesEvent;
use craft\helpers\UrlHelper;
use craft\web\UrlManager;

use yii\base\Event;

class ElementIndexDefaults extends Plugin
{
    // Properties
    // =========================================================================

    public bool $hasCpSettings = true;
    public string $schemaVersion = '1.0.0';


    // Traits
    // =========================================================================

    use PluginTrait;


    // Public Methods
    // =========================================================================

    public function init(): void
    {
        parent::init();

        self::$plugin = $this;

        $this->_setPluginComponents();
        $this->_setLogging();
        $this->_registerCpRoutes();
        $this->_registerEventHandlers();
    }

    public function getSettingsResponse(): mixed
    {
        return Craft::$app->getResponse()->redirect(UrlHelper::cpUrl('element-index-defaults/settings'));
    }


    // Protected Methods
    // =========================================================================

    protected function createSettingsModel(): ?Model
    {
        return new Settings();
    }


    // Private Methods
    // =========================================================================

    private function _registerCpRoutes(): void
    {
        Event::on(UrlManager::class, UrlManager::EVENT_REGISTER_CP_URL_RULES, function(RegisterUrlRulesEvent $event) {
            $event->rules = array_merge($event->rules, [
                'element-index-defaults/settings' => 'element-index-defaults/base/settings',
            ]);
        });
    }

    private function _registerEventHandlers(): void
    {
        // Setup defaults for our supported elements
        /* @var Settings $settings */
        $settings = ElementIndexDefaults::$plugin->getSettings();

        foreach ($settings->getElementDefaults() as $elementClass => $elementDefault) {
            Event::on($elementClass, Element::EVENT_REGISTER_DEFAULT_TABLE_ATTRIBUTES, function(RegisterElementDefaultTableAttributesEvent $event) use ($elementDefault) {
                $event->tableAttributes = $elementDefault;
            });
        }
    }
}
