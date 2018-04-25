# Element Index Defaults Plugin for Craft CMS

<img width="500" src="https://github.com/verbb/element-index-defaults/blob/master/screenshots/main.png">

Element Index Defaults is a Craft CMS plugin the help set useful defaults for your element indexes. This only sets the default columns on element indexes - you can still use the small 'cog' icon to edit table columns on a per-source basis as normal.

Supported Elements:
- Assets
- Categories
- Entries

### Control Panel

Install the plugin, go to Settings > Element Index Defaults. Use the menu on the left to select your element, and enable/disable, and move any columns around. Be sure to save - and you're done!

### Configuration File

For even more flexibility, make a config file as part of your regular Craft setup, and never have to worry about it again. Create a file named `element-index-defaults.php` in your config folder for Craft. You'll have access to the following:

```
<?php

return [
    'Entry' => [
        'title',
        'postDate',
        'dateUpdated',
        'link',
    ],
    'Category' => [
        'title',
        'link',
    ],
    'Asset' => [
        'title',
        'filename',
        'size',
        'dateModified',
    ]
];

?>
```

All settings are stored in the plugin's settings, so if you ever have trouble, simply uninstall the plugin, and indexes will go back to their default state.

<h2></h2>

<a href="https://verbb.io" target="_blank">
  <img width="100" src="https://verbb.io/assets/img/verbb-pill.svg">
</a>

