# Configuration

You can customise Element Index Defaults’ settings using a PHP configuration file. This is optional: add only the defaults you want to supply.

Create `element-index-defaults.php` in your Craft project's `/config` directory. For example, this sets the initial entry-index columns to title, post date and expiry date:

```php
<?php

use craft\elements\Entry;

return [
    'elementDefaults' => [
        Entry::class => ['title', 'postDate', 'expiryDate'],
    ],
];
```

The outer key identifies an element class; its value lists the attributes to show as columns. Add another class key when you want defaults for categories or assets. Use attributes available on that element type.

To check the change, open the Entries index with a user/source combination that has no saved column preferences. The initial columns should include Title, Post Date and Expiry Date in that order. This plugin supplies Craft's default columns; an editor's saved per-source column choices can take precedence. Test with a fresh user or reset the source's column preferences when an existing index looks unchanged.

## Configuration Options
::: reference
### `elementDefaults`

**Type:** `array` · **Default:** `[]`

A collection of attributes for elements that are defaults. The key for the array should be the element class, and the value being an array of element attributes that are enabled to be used as table columns in the element index.
:::

## Control Panel
You can also manage configuration settings through the Control Panel by visiting Settings → Element Index Defaults.
