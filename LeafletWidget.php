<?php

namespace panix\ext\leaflet;

use yii\helpers\Html;
use yii\base\Widget;
use yii\helpers\Json;

class LeafletWidget extends Widget
{

    /**
     * @var string prefix for the autogenerated id
     */
    public static $autoIdPrefix = 'leaflet';

    /**
     * @var string the widget container element
     * Defaults to div
     */
    public $containerTag = 'div';

    /**
     * @var array the HTML attributes for the widget container
     * Defaults to an auto generated id and class => "owl-carousel"
     */
    public $containerOptions = [];

    /**
     * @var array options for the Owl Carousel plugin
     * @link https://owlcarousel2.github.io/OwlCarousel2/docs/api-options.html Available Options
     */
    public $options = [];

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        $view = $this->getView();
        $this->registerAssets($view);
        if (!isset($this->containerOptions['class'])) {
            $this->containerOptions['class'] = 'owl-leaflet';
        }
        $this->initOptions();
        echo Html::beginTag($this->containerTag, $this->containerOptions) . "\n";
    }

    /**
     * Intialises the plugin options
     */
    protected function initOptions()
    {
        $this->containerOptions = array_merge([
            'id' => $this->getId()
        ], $this->containerOptions);
        Html::addCssClass($this->containerOptions, 'owl-leaflet');
    }

    /**
     * Registers the needed assets.
     *
     * @param \yii\web\View $view The View object
     */
    public function registerAssets($view)
    {
        LeafletAsset::register($view);
        $js = '
        
        
var map = L.map("' . $this->getId() . '").setView([51.505, -0.09], 13);

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: "&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors"
}).addTo(map);


L.marker([51.5, -0.09]).addTo(map)
    .bindPopup("A pretty CSS3 popup.<br> Easily customizable.")
    .openPopup();

';
        $view->registerJs($js, $view::POS_END);
    }

    /**
     * Executes the widget.
     * @return string the result of widget execution to be outputted.
     */
    public function run()
    {
        echo "\n" . Html::endTag($this->containerTag);
    }

}
