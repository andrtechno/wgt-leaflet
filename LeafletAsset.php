<?php

namespace panix\ext\leaflet;

use yii\web\AssetBundle;


class LeafletAsset extends AssetBundle
{

    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];
    /**
     * @var string the directory that contains the source asset files for this asset bundle.
     */
    public $sourcePath = '@npm/leaflet/dist';

    /**
     * @var array list of CSS files that this bundle contains.
     */
    public $css = [
        'leaflet.css',
    ];

    /**
     * @var array list of JavaScript files that this bundle contains.
     */
    public $js = [
        'leaflet.js',
    ];
}
