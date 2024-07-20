<?php
namespace app\assets;

use yii\web\AssetBundle;

class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@npm/@fortawesome/fontawesome-free';
    public $css = [
        'css/all.min.css',
    ];
    public $js = [

    ];
    public $depends = [

    ];
}
