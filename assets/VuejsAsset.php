<?php
/**
 * @link https://vuejs.org/
 */

namespace app\assets;

use yii\web\AssetBundle;

class VuejsAsset extends AssetBundle
{
    public $sourcePath = '@npm';
    public $css = [
    ];
    public $js = [
        //'vue/dist/vue.min.js',
        'vue/dist/vue.js',
    ];
    public $depends = [
    ];
}
