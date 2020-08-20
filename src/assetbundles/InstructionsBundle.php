<?php

namespace vaersaagod\instructions\assetbundles;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * Class InstructionsBundle
 * @package vaersaagod\instructions\assetbundles
 */
class InstructionsBundle extends AssetBundle
{
    /**
     *  Add some CSS and JS to the CP yo
     */
    public function init()
    {
        // define the path that your publishable resources live
        $this->sourcePath = '@vaersaagod/instructions/assetbundles/dist';

        // define the dependencies
        $this->depends = [
            CpAsset::class,
        ];

        // define the relative path to CSS/JS files that should be registered with the page
        // when this asset bundle is registered
        $this->js = [

        ];

        $this->css = [
            'instructionsfield.css',
        ];

        parent::init();
    }
}
