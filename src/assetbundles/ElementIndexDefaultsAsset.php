<?php
namespace verbb\elementindexdefaults\assetbundles;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class ElementIndexDefaultsAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    public function init()
    {
        $this->sourcePath = "@verbb/elementindexdefaults/resources/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/element-index-defaults.js',
        ];

        $this->css = [
            'css/element-index-defaults.css',
        ];

        parent::init();
    }
}
