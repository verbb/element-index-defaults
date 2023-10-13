<?php
namespace verbb\elementindexdefaults\base;

use verbb\elementindexdefaults\ElementIndexDefaults;

use verbb\base\LogTrait;
use verbb\base\helpers\Plugin;

trait PluginTrait
{
    // Properties
    // =========================================================================

    public static ?ElementIndexDefaults $plugin = null;


    // Traits
    // =========================================================================

    use LogTrait;
    

    // Static Methods
    // =========================================================================

    public static function config(): array
    {
        Plugin::bootstrapPlugin('element-index-defaults');

        return [];
    }

}