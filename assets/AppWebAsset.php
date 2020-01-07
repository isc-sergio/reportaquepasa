<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Application Web asset bundle.
 *
 * @author sergio
 */
class AppWebAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/appweb.css',
    ];
    public $js = [
        'js/app-web.js',
    ];
    public $depends = [
        'app\assets\VuejsAsset',
        'app\assets\LeafletAsset',
    ];
}
