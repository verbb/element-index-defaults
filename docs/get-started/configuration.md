# Configuration

You can customise Element Index Defaults’ settings using a PHP configuration file. This is optional: each setting has a default, so you only need to include the values you want to change.

To override a setting, create `element-index-defaults.php` in your Craft project’s `/config` directory and return an array of setting names and values. For example, the following will set the initial entry-index columns to title, post date and expiry date:

```php
<?php

return [
    'elementDefaults' => [
        \craft\elements\Entry::class => ['title', 'postDate', 'expiryDate'],
    ],
];
```

All other settings keep their defaults. Add any further settings you want to change to the same array. The options below explain the available settings and their defaults. You can also manage these settings in the control panel under **Settings → Element Index Defaults**.

## Configuration Options
::: reference
### `elementDefaults`

**Type:** `array` · **Default:** `[]`

A collection of attributes for elements that are defaults. The key for the array should be the element class, and the value being an array of element attributes that are enabled to be used as table columns in the element index.

Add another class key when you want defaults for categories or assets, and use attributes available on that element type.

To check the change, open the Entries index with a user/source combination that has no saved column preferences. The initial columns should include Title, Post Date and Expiry Date in that order. This plugin supplies Craft's default columns, and an editor's saved per-source column choices can take precedence. Test with a fresh user or reset the source's column preferences when an existing index looks unchanged.
:::
