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
    public $width = '100%';
    public $height = '300px';
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
        //if (!isset($this->containerOptions['class'])) {
        //    $this->containerOptions['class'] = 'owl-leaflet';
        // }

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
        
        
var map = L.map("' . $this->getId() . '",{
      //center: new L.LatLng(46.44136,30.70430),
      center: [46.44136,30.70430],
      zoom: 13,

     // layers: [osmLayer]
    });

/*L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?hash={hash}", {
    hash: Math.random(),
    attribution: "Map data &copy; <a href=\"https://www.openstreetmap.org/\">OpenStreetMap</a> contributors, <a href=\"https://creativecommons.org/licenses/by-sa/2.0/\">CC-BY-SA</a>"
      //maxZoom: 17,
      //minZoom: 9
}).addTo(map);*/


L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
    attribution: "&copy; <a href=\"http://osm.org/copyright\">OpenStreetMap</a> contributors 2"
}).addTo(map);

var marker = L.marker([46.44136,30.70430],{
    draggable: true
    }).addTo(map)
        .bindPopup("A pretty CSS3 popup.<br> Easily customizable.")
        .openPopup();

marker.on("dragend", function(distance){
console.log(distance.target._latlng.lat,distance.target._latlng.lng);
$("#dynamicmodel-latitude").val(distance.target._latlng.lat);
$("#dynamicmodel-longitude").val(distance.target._latlng.lng);
});


';
        $view->registerJs($js, $view::POS_END);
    }

    /**
     * Executes the widget.
     * @return string the result of widget execution to be outputted.
     */
    public function run()
    {
        if (!isset($this->containerOptions['id'])) {
            $this->containerOptions['id'] = $this->getId();
        }

        $this->containerOptions = array_merge([
            'id' => $this->getId()
        ], $this->containerOptions);
        //Html::addCssClass($this->containerOptions, 'leaflet');
        Html::addCssStyle($this->containerOptions, "width:{$this->width};height:{$this->height};");
        return Html::tag($this->containerTag, '',$this->containerOptions);
    }

}