# Element Index Defaults Plugin for Craft CMS

Element Index Defaults is a Craft CMS plugin to help set useful defaults for your element indexes. This only sets the default columns on element indexes - you can still use the small 'cog' icon to edit table columns on a per-source basis as normal.

<img src="https://github.com/verbb/element-index-defaults/blob/craft-3/screenshots/settings.png?raw=true" style="box-shadow: 0 4px 16px rgba(0,0,0,0.08); border-radius: 4px; border: 1px solid rgba(0,0,0,0.12);">

## Installation
You can install Element Index Defaults via the plugin store, or through Composer.

### Craft Plugin Store
To install **Element Index Defaults**, navigate to the _Plugin Store_ section of your Craft control panel, search for `Element Index Defaults`, and click the _Try_ button.

### Composer
You can also add the package to your project using Composer.

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:
    
        composer require verbb/element-index-defaults

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Element Index Defaults.

### Control Panel
Install the plugin, go to Settings > Element Index Defaults. Use the menu on the left to select your element, and enable/disable, and move any columns around. Be sure to save - and you're done!

### Configuration File
For even more flexibility, make a config file as part of your regular Craft setup, and never have to worry about it again. Create a file named `element-index-defaults.php` in your config folder for Craft. You'll have access to the following:

```
<?php
use craft\elements\Asset;
use craft\elements\Category;
use craft\elements\Entry;

return [
    'elementDefaults' => [
        Entry::class => [
            'title',
            'postDate',
            'expiryDate',
            'author',
            'link',
        ],

        Category::class => [
            'title',
            'link',
        ],

        Asset::class => [
            'title',
            'filename',
            'size',
            'dateModified',
        ],
    ],
];
```

The above shows the plugin defaults, which you can extend or override. You can pass any additional element configurations by adding them to the `elementDefaults` array. For example, you might like to setup defaults for the [Verbb Events](https://github.com/verbb/events) plugin.

```
<?php
use craft\elements\Entry;
use verbb\events\elements\Event;

return [
    'elementDefaults' => [
        Event::class => [
            'title',
            'link',
        ],

        Entry::class => [
            'title',
            'link',
        ],
    ],
];
```

In addition, we're also showing how to override the entries index. All other defaults are untouched. All settings are stored in the plugin's settings, so if you ever have trouble, simply uninstall the plugin, and indexes will go back to their default state.

## Show your Support
Element Index Defaults is licensed under the MIT license, meaning it will always be free and open source – we love free stuff! If you'd like to show your support to the plugin regardless, [Sponsor](https://github.com/sponsors/verbb) development.

<h2></h2>

<a href="https://verbb.io" target="_blank">
  <img width="100" src="https://verbb.io/assets/img/verbb-pill.svg">
</a>

