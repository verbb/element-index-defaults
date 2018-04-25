<?php
namespace verbb\elementindexdefaults\models;

use craft\base\Model;

class Settings extends Model
{
    // Public Properties
    // =========================================================================

    public $Entry = [
        'title',
        'postDate',
        'expiryDate',
        'author',
        'link',
    ];

    public $Category = [
        'title',
        'link',
    ];

    public $Asset = [
        'title',
        'filename',
        'size',
        'dateModified',
    ];

}