<?php
/**
 * @link https://leafletjs.com/
 */

namespace app\assets;

use yii\web\AssetBundle;

class LeafletAsset extends AssetBundle
{
    public $sourcePath = '@npm';
    public $css = [
        'leaflet/dist/leaflet.css',
    ];
    public $js = [
        'leaflet/dist/leaflet.js',
    ];
    public $depends = [
    ];
}
