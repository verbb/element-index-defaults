<?php
namespace verbb\elementindexdefaults;

use verbb\elementindexdefaults\base\PluginTrait;
use verbb\elementindexdefaults\models\Settings;

use Craft;
use craft\base\Element;
use craft\base\Plugin;
use craft\elements\Asset;
use craft\elements\Category;
use craft\elements\Entry;
use craft\events\RegisterUrlRulesEvent;
use craft\events\RegisterElementDefaultTableAttributesEvent;
use craft\helpers\UrlHelper;
use craft\web\UrlManager;

use yii\base\Event;

class ElementIndexDefaults extends Plugin
{
    // Public Properties
    // =========================================================================

    public $schemaVersion = '1.0.0';
    public $hasSettings = true;


    // Traits
    // =========================================================================

    use PluginTrait;


    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();

        self::$plugin = $this;

        $this->_setPluginComponents();
        $this->_setLogging();
        $this->_registerCpRoutes();
        $this->_registerEventHandlers();
    }

    public function getSettingsResponse()
    {
        Craft::$app->getResponse()->redirect(UrlHelper::cpUrl('element-index-defaults/settings'));
    }


    // Protected Methods
    // =========================================================================

    protected function createSettingsModel(): Settings
    {
        return new Settings();
    }


    // Private Methods
    // =========================================================================

    private function _registerCpRoutes()
    {
        Event::on(UrlManager::class, UrlManager::EVENT_REGISTER_CP_URL_RULES, function(RegisterUrlRulesEvent $event) {
            $event->rules = array_merge($event->rules, [
                'element-index-defaults/settings' => 'element-index-defaults/base/settings',
            ]);
        });
    }

    private function _registerEventHandlers()
    {
        // Setup defaults for our supported elements
        Event::on(Entry::class, Element::EVENT_REGISTER_DEFAULT_TABLE_ATTRIBUTES, function(RegisterElementDefaultTableAttributesEvent $event) {
            $settings = ElementIndexDefaults::$plugin->getSettings();

            $event->tableAttributes = $settings['Entry'];
        });

        Event::on(Category::class, Element::EVENT_REGISTER_DEFAULT_TABLE_ATTRIBUTES, function(RegisterElementDefaultTableAttributesEvent $event) {
            $settings = ElementIndexDefaults::$plugin->getSettings();

            $event->tableAttributes = $settings['Category'];
        });

        Event::on(Asset::class, Element::EVENT_REGISTER_DEFAULT_TABLE_ATTRIBUTES, function(RegisterElementDefaultTableAttributesEvent $event) {
            $settings = ElementIndexDefaults::$plugin->getSettings();

            $event->tableAttributes = $settings['Asset'];
        });
    }
}
