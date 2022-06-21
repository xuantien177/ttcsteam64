<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class StoreNixAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "frontend/giao_dien/storenix/assets/css/animate.css" ,
    "frontend/giao_dien/storenix/assets/revolution/css/settings.css" ,
    "frontend/giao_dien/storenix/assets/revolution/css/navigation.css" ,
    "frontend/giao_dien/storenix/assets/css/bootstrap.min.css" ,
    "frontend/giao_dien/storenix/assets/lib/slick/slick.css" ,
    "frontend/giao_dien/storenix/assets/lib/slick/slick-theme.css" ,
    "frontend/giao_dien/storenix/assets/css/ionicons.min.css" ,
    "frontend/giao_dien/storenix/assets/css/font-awesome.min.css" ,
    "frontend/giao_dien/storenix/assets/css/style.css" ,
    "frontend/giao_dien/storenix/assets/css/responsive.css" ,
    "frontend/giao_dien/storenix/assets/css/color.css" ,
        "frontend/giao_dien/storenix/assets/css/color3.css" ,
    ];
    public $js = [
         "frontend/giao_dien/storenix/assets/js/jquery.min.js",
    "frontend/giao_dien/storenix/assets/js/switcher.js",
    "frontend/giao_dien/storenix/assets/js/popper.js",
    "frontend/giao_dien/storenix/assets/js/bootstrap.min.js",
    "frontend/giao_dien/storenix/assets/lib/slick/slick.min.js",
    "frontend/giao_dien/storenix/assets/js/isotope.js",
    "frontend/giao_dien/storenix/assets/js/isotope-script.js",
    "frontend/giao_dien/storenix/assets/js/html5lightbox.js",
        "frontend/giao_dien/storenix/assets/js/jquery.blockUI.js",

    "frontend/giao_dien/storenix/assets/revolution/js/jquery.themepunch.tools.min.js",
    "frontend/giao_dien/storenix/assets/revolution/js/jquery.themepunch.revolution.min.js",

    "frontend/giao_dien/storenix/assets/revolution/js/revolution.extension.actions.min.js",
    "frontend/giao_dien/storenix/assets/revolution/js/revolution.extension.carousel.min.js",
    "frontend/giao_dien/storenix/assets/revolution/js/revolution.extension.kenburn.min.js",
    "frontend/giao_dien/storenix/assets/revolution/js/revolution.extension.layeranimation.min.js",
    "frontend/giao_dien/storenix/assets/revolution/js/revolution.extension.migration.min.js",
    "frontend/giao_dien/storenix/assets/revolution/js/revolution.extension.navigation.min.js",
    "frontend/giao_dien/storenix/assets/revolution/js/revolution.extension.parallax.min.js",
    "frontend/giao_dien/storenix/assets/revolution/js/revolution.extension.slideanims.min.js",
    "frontend/giao_dien/storenix/assets/revolution/js/revolution.extension.video.min.js",
    "frontend/giao_dien/storenix/assets/revolution/js/revolution.initialize.js",
    "frontend/giao_dien/storenix/assets/js/wow.js",
    "frontend/giao_dien/storenix/assets/js/script.js",
        "frontend/giao_dien/storenix/assets/js/main.js",
    ];
//    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap4\BootstrapAsset',
//    ];
}
