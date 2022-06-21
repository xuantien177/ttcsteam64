<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        'js/main.js'
    ];
    public $depends = [
        'yiister\gentelella\assets\ThemeAsset',
        'yiister\gentelella\assets\ExtensionAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
