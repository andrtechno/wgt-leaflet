<?php

namespace panix\ext\leaflet;

use yii\web\AssetBundle;


class LeafletRoutingAsset extends AssetBundle
{

    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];
    /**
     * @var string the directory that contains the source asset files for this asset bundle.
     */
    public $sourcePath = __DIR__.'/routing';
    public $css = [
        'leaflet-routing-machine.css',
    ];
    /**
     * @var array list of JavaScript files that this bundle contains.
     */
    public $js = [
        'leaflet-routing-machine.min.js',
    ];

    public $depends = [
        'panix\ext\leaflet\LeafletAsset'
    ];
}
