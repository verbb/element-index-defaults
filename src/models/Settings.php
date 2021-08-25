<?php
namespace verbb\elementindexdefaults\models;

use craft\base\Model;
use craft\elements\Asset;
use craft\elements\Category;
use craft\elements\Entry;

class Settings extends Model
{
    // Properties
    // =========================================================================

    public $elementDefaults = [];

    private $defaults = [
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
    ];

    // Public Properties
    // =========================================================================

    public function getElementDefaults()
    {
        return array_merge($this->defaults, $this->elementDefaults);
    }

}