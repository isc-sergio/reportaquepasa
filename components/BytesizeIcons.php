<?php

namespace app\components;

use Yii;
use yii\base\BaseObject;

class BytesizeIcons extends BaseObject
{
    private static $_url;

    private static function getUrl()
    {
        if (self::$_url == null) {
            self::$_url = Yii::getAlias('@web/bytesize-symbols.min.svg') . '#';
        }

        return self::$_url;
    }

    public static function getIcon($name, $options = [])
    {
        return '<svg class="i"><use href="' . self::getUrl() . $name . '"></use></svg>';
    }
}