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

    public array $elementDefaults = [];

    private array $defaults = [
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
    /**
     * @return array
     */
    public function getElementDefaults(): array
    {
        return array_merge($this->defaults, $this->elementDefaults);
    }

}