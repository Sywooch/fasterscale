<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace site\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@assets';
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';

    public $css = [
        'css/app.scss',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'site\assets\JuiAsset',
        'macgyer\yii2materializecss\assets\MaterializeAsset',
        'macgyer\yii2materializecss\assets\MaterializePluginAsset',
        'site\assets\ChartjsAsset',
    ];
}
