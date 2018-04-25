<?php
namespace verbb\elementindexdefaults;

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

use verbb\elementindexdefaults\models\Settings;

use yii\base\Event;

class ElementIndexDefaults extends Plugin
{
    // Static Properties
    // =========================================================================

    public static $plugin;


    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();

        self::$plugin = $this;

        // Register our CP routes
        Event::on(UrlManager::class, UrlManager::EVENT_REGISTER_CP_URL_RULES, [$this, 'registerCpUrlRules']);

        // Setup defaults for our supported elements
        Event::on(Entry::class, Element::EVENT_REGISTER_DEFAULT_TABLE_ATTRIBUTES, [$this, 'entryDefaultTableAttributes']);
        Event::on(Category::class, Element::EVENT_REGISTER_DEFAULT_TABLE_ATTRIBUTES, [$this, 'categoryDefaultTableAttributes']);
        Event::on(Asset::class, Element::EVENT_REGISTER_DEFAULT_TABLE_ATTRIBUTES, [$this, 'assetDefaultTableAttributes']);
    }

    public function entryDefaultTableAttributes(RegisterElementDefaultTableAttributesEvent $event)
    {
        $settings = ElementIndexDefaults::$plugin->getSettings();

        $event->tableAttributes = $settings['Entry'];
    }

    public function categoryDefaultTableAttributes(RegisterElementDefaultTableAttributesEvent $event)
    {
        $settings = ElementIndexDefaults::$plugin->getSettings();

        $event->tableAttributes = $settings['Category'];
    }

    public function assetDefaultTableAttributes(RegisterElementDefaultTableAttributesEvent $event)
    {
        $settings = ElementIndexDefaults::$plugin->getSettings();

        $event->tableAttributes = $settings['Asset'];
    }

    public function registerCpUrlRules(RegisterUrlRulesEvent $event)
    {
        $rules = [
            'element-index-defaults/settings' => 'element-index-defaults/base/settings',
        ];

        $event->rules = array_merge($event->rules, $rules);
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
}
