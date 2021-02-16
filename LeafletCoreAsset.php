<?php

namespace panix\ext\leaflet;

use yii\web\AssetBundle;


class LeafletCoreAsset extends AssetBundle
{

    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];
    /**
     * @var string the directory that contains the source asset files for this asset bundle.
     */
    public $sourcePath = __DIR__.'/assets';

    /**
     * @var array list of JavaScript files that this bundle contains.
     */
    public $js = [
        'js/MovingMarker.js',
    ];

    public $depends = [
        'panix\ext\leaflet\LeafletAsset'
    ];
}
