<?php

namespace panix\ext\leaflet;

use yii\web\AssetBundle;


class LeafletAsset extends AssetBundle
{

    public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];
    /**
     * @var string the directory that contains the source asset files for this asset bundle.
     */
    public $sourcePath = '@bower/leaflet';

    /**
     * @var array list of CSS files that this bundle contains.
     */
    public $css = [
        'dist/assets/owl.carousel.min.css',
        'dist/assets/owl.theme.default.min.css',
    ];

    /**
     * @var array list of JavaScript files that this bundle contains.
     */
    public $js = [
        'dist/owl.carousel.min.js',
    ];

    /**
     * @var array list of depends assets that this bundle contains.
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];

}
