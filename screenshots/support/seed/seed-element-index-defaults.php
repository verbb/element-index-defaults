/** Seed representative Craft 5 entry-index defaults for the feature screenshot. */

use craft\elements\Entry;
use craft\helpers\Json;
use craft\helpers\ProjectConfig as ProjectConfigHelper;

$plugin = Craft::$app->getPlugins()->getPlugin('element-index-defaults');

if (!$plugin) {
    throw new RuntimeException('Element Index Defaults is not installed.');
}

$settingsSaved = Craft::$app->getPlugins()->savePluginSettings($plugin, [
    'elementDefaults' => [
        Entry::class => [
            'title',
            'postDate',
            'authors',
            'status',
            'link',
        ],
    ],
]);

if (!$settingsSaved) {
    throw new RuntimeException('Unable to save Element Index Defaults screenshot settings.');
}

$projectConfig = Craft::$app->getProjectConfig();
$projectConfig->saveModifiedConfigData();
$projectConfig->writeYamlFiles(true);

$savedSettings = ProjectConfigHelper::unpackAssociativeArrays(
    $projectConfig->get('plugins.element-index-defaults.settings') ?? [],
);

if (($savedSettings['elementDefaults'][Entry::class] ?? []) !== ['title', 'postDate', 'authors', 'status', 'link']) {
    throw new RuntimeException('Element Index Defaults screenshot settings were not persisted: ' . Json::encode($savedSettings));
}

echo Json::encode([
    'settingsSaved' => true,
], JSON_THROW_ON_ERROR);
