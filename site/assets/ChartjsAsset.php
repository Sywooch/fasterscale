<?php

namespace site\assets;

use yii\web\AssetBundle;

class ChartjsAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/chartjs/dist';
    public $js = [
        'Chart.min.js',
    ];
}

