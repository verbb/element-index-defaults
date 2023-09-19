# Configuration
Create a `element-index-defaults.php` file under your `/config` directory with the following options available to you. You can also use multi-environment options to change these per environment.

The below shows the defaults already used by Element Index Defaults, so you don't need to add these options unless you want to modify the values.

```php
<?php
use craft\elements\Asset;
use craft\elements\Category;
use craft\elements\Entry;

return [
    '*' => [
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
    ],
];
```

## Configuration options
- `elementDefaults` - A collection of attributes for elements that are defaults. The key for the array should be the element class, and the value being an array of element attributes that are enabled to be used as table columns in the element index.


## Control Panel
You can also manage configuration settings through the Control Panel by visiting Settings → Element Index Defaults.
